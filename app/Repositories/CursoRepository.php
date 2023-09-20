<?php

namespace App\Repositories;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CursoRepositoryInterface;
use App\Models\Curso;

class CursoRepository implements CursoRepositoryInterface
{
    public readonly Curso $curso;

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    public function findAll()
    {
        $cursos = $this->curso->all();
        return $cursos;
    }

    public function find(string $id)
    {
        $id = $this->curso->find($id);
        return view('curso.edit', ['curso' => $id]);
    }

    public function edit(String $id, Request $request)
    {
        $atualizado = $this->curso->where('id', $id)->update($request->except(['_token','_method']));
        if($atualizado){
            return redirect()->back()->with('message', 'Sucesso!');
        }
        return redirect()->back()->with('message', 'Error!');
    }

    public function create(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        $curso = Curso::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        event(new Registered($curso));
    }
}
