<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CursoRepositoryInterface
{
    public function findAll();
    public function create(Request $request);
}
