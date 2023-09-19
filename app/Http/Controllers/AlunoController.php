<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CursoRepositoryInterface;
use App\Repositories\Contracts\AlunoRepositoryInterface;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public CursoRepositoryInterface $cursoRepository;
    /**
     * Display a listing of the resource.
     */
    public function index(AlunoRepositoryInterface $repository)
    {
        return $repository->findAll();

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
    public function show(string $id)
    {
        //
    }

    public function edit(AlunoRepositoryInterface $repository, string $id)
    {
        return $repository->edit($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(AlunoRepositoryInterface $repository, string $id)
    {
        var_dump($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
