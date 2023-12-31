<?php

namespace App\Repositories\Contracts;

use App\Models\Aluno;
use Illuminate\Http\Request;

interface AlunoRepositoryInterface
{
    public function delete(string $id);
    public function edit(String $id, Request $request);
    public function find(string $id);
    public function findAll();
    public function create(Request $request);
}
