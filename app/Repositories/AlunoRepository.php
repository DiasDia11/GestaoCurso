<?php

namespace App\Repositories;

use Illuminate\Auth\Events\Registered;
use App\Models\Aluno;
use App\Models\AlunosCurso;
use App\Repositories\Contracts\AlunoRepositoryInterface;
use Illuminate\Http\Request;

class AlunoRepository implements AlunoRepositoryInterface
{
    public readonly Aluno $aluno;

    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    public function edit(String $id, Request $request)
    {
        $atualizado = $this->aluno->where('id', $id)->update($request->except(['_token','_method']));
        if($atualizado){
            return redirect()->back()->with('message', 'Sucesso!');
        }
        return redirect()->back()->with('message', 'Error!');
    }

    public function matriculaAlunoCurso(Aluno $aluno,Request $request)
    {
        if($request->curso != 'Selecione o Curso'){
            $alunoCurso = AlunosCurso::create([
                'curso_id' => $request->curso,
                'aluno_id' => $aluno->id,
            ]);
            event(new Registered($alunoCurso));
            return;
        }
    }

    public function findAll()
    {
        $alunos = $this->aluno->all();
        return view('aluno.aluno',['alunos' => $alunos]);
    }

    public function find(string $id)
    {
        $id = $this->aluno->find($id);
        return $id;
    }


    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string',
            'dtnascimento' => 'required|date',
        ]);

        $aluno = Aluno::firstOrCreate([
            'nome' => $request->nome,
            'email' => $request->email,
            'dtnascimento' => $request->dtnascimento,
        ]);

        event(new Registered($aluno));

        $this->matriculaAlunoCurso($aluno,$request);
    }
}
