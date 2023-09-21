<?php

namespace App\Repositories\Contracts;

use App\Models\Aluno;
use App\Models\AlunosCurso;
use Illuminate\Http\Request;

interface AlunoCursoRepositoryInterface
{
    public function list(string $id);
    public function findAll();
    public function delete(string $id);
    public function matriculaAlunoCurso(Aluno $aluno,Request $request);
}
