<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AlunoCursoRepositoryInterface;
use App\Repositories\Contracts\CursoRepositoryInterface;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CursoRepositoryInterface $cursoRepository)
    {
        $cursos = $cursoRepository->findAll();
        return view('curso.listaCurso', ['cursos' => $cursos]);
    }

    public function create()
    {
        return view('curso.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRepositoryInterface $repository, Request $request)
    {
        $repository->create($request);

        return redirect('/curso/create');
    }

    public function list(CursoRepositoryInterface $repository)
    {
        $cursos = $repository->findAll();
        return view('curso.listaCurso',['cursos' => $cursos]);
    }

    public function edit(CursoRepositoryInterface $repository, string $id)
    {
        $curso = $repository->find($id);
        return view('curso.edit', ['curso' => $curso]);
    }

    public function findAlunos(CursoRepositoryInterface $repository, string $id){

    }

    /**
     * Display the specified resource.
     */
    public function show(CursoRepositoryInterface $repository,string $id)
    {
        $curso = $repository->find($id);
        return view('curso.alunos',['curso' => $curso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRepositoryInterface $repository,Request $request, string $id)
    {
        return $repository->edit($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
