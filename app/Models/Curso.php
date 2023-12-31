<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function alunos()
    {
        return $this->hasMany(AlunosCurso::class);
    }

    protected $fillable = [
        'titulo',
        'descricao',
    ];
}
