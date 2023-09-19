<?php

namespace App\Http\Controllers;

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
        return $repository->findAll();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
