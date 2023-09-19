<?php

namespace App\Repositories\Contracts;

use App\Models\Aluno;
use Illuminate\Http\Request;

interface AlunoRepositoryInterface
{
    public function edit(string $id);
    public function findAll();
    public function create(Request $request);
    public function matriculaAlunoCurso(Aluno $aluno,Request $request);
}
