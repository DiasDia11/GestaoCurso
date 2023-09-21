<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AlunoCursoRepositoryInterface;
use App\Repositories\Contracts\CursoRepositoryInterface;
use App\Repositories\Contracts\AlunoRepositoryInterface;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public CursoRepositoryInterface $cursoRepository;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aluno.aluno');

    }

    public function create(CursoRepositoryInterface $cursoRepository)
    {
        $cursos = $cursoRepository->findAll();
        return view('aluno.criaAluno',['cursos' => $cursos]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AlunoRepositoryInterface $repository,Request $request)
    {
        $repository->create($request);
        return redirect('/aluno/create');
    }

    public function list(AlunoRepositoryInterface $repository)
    {
        return $repository->findAll();
    }
    /**
     * Display the specified resource.
     */
    public function show(AlunoRepositoryInterface $repository,string $id)
    {
        $aluno = $repository->find($id);
        return view('aluno.show',['aluno' => $aluno]);
    }

    public function edit(AlunoRepositoryInterface $repository, string $id)
    {
        $aluno = $repository->find($id);
        return view('aluno.edit',['aluno' => $aluno]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(AlunoRepositoryInterface $repository, Request $request, string $id)
    {
       return $repository->edit($id,$request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlunoRepositoryInterface $repository,string $id)
    {
        return $repository->delete($id);
    }
}
