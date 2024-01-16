<?php

class Empresa
{
    public $id;
    public $nome;
    public $funcionarios = [];

    public function __construct($id)
    {
        $this->nome = 'Empresa número ' . $id;
        $this->funcionarios = [];
    }

    //colocar restrição aqui para só receber atributos do tipo funcionário
    public function addFuncionario($funcionario)
    {
        $this->funcionarios[] = $funcionario;
    }

    public function getFuncionarios()
    {
        return $this->funcionarios;
    }
}
