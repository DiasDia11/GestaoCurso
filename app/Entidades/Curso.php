<?php

namespace App\Entidades;

class CursoEntidade
{
    private $titulo;
    private $descricao;

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

}
