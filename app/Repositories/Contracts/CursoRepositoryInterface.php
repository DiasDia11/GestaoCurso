<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CursoRepositoryInterface
{
    public function edit(String $id, Request $request);
    public function find(string $id);
    public function findAll();
    public function create(Request $request);
}
