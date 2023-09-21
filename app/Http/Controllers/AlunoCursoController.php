<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Repositories\Contracts\AlunoCursoRepositoryInterface;
use App\Repositories\Contracts\CursoRepositoryInterface;
use Illuminate\Http\Request;

class AlunoCursoController extends Controller
{

    public function list(AlunoCursoRepositoryInterface $repository, string $id)
    {
        $lista = $repository->list($id);
        return $lista;
    }

}
