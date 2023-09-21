<?php

namespace App\Repositories;

use Illuminate\Auth\Events\Registered;
use App\Models\Aluno;
use App\Models\AlunosCurso;
use App\Models\Curso;
use App\Repositories\Contracts\AlunoCursoRepositoryInterface;
use Illuminate\Http\Request;

class AlunoCursoRepository implements AlunoCursoRepositoryInterface
{

    public readonly AlunosCurso $alunoNoCurso;

    public function __construct(AlunosCurso $alunoNoCurso)
    {
        $this->alunoNoCurso = $alunoNoCurso;
    }

    public function list(string $id){
        $cursoEncontrado = Curso::find($id);
        $curso = $cursoEncontrado->alunos;
        $idsDosAlunos = $curso->pluck('aluno_id')->toArray();
        $idDoCursos = $curso->pluck('curso_id')->toArray();
        $tituloDoCurso = Curso::whereIn('id', $idDoCursos)->pluck('titulo', 'id');
        $nomesDosAlunos = Aluno::whereIn('id', $idsDosAlunos)->pluck('nome', 'id');

        return view('curso.alunos', ['curso' => $curso, 'nomesDosAlunos' => $nomesDosAlunos, 'titulo' => $tituloDoCurso]);
    }

    public function findAll(){
        $aluno = $this->alunoNoCurso->all();
        return $aluno;
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

    public function delete(string $id){
        $this->alunoNoCurso->where('aluno_id', $id)->delete();
        return redirect()->route('aluno.lista');
    }
}
