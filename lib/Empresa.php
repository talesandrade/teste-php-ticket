<?php

class Empresa
{
    public $id;
    public $nome;
    public $funcionarios = [];

    # Método construtor que define o nome da empresa de acordo com o id informado
    # e inicializa o array de funcionários em branco sempre que a classe for instânciada novamente.
    public function __construct($id)
    {
        $this->nome = 'Empresa número ' . $id;
        $this->funcionarios = [];
    }

    //colocar restrição aqui para só receber atributos do tipo funcionário
    # Método adiciona um funcionário a lista de funcionários da empresa
    public function addFuncionario($funcionario)
    {
        $this->funcionarios[] = $funcionario;
    }

    # Método retorna todos funcionarios da empresa
    public function getFuncionarios()
    {
        return $this->funcionarios;
    }
}

class TicketAndGo extends Empresa
{
    public $qualidades = [K_FUNCIONARIO_HONESTO,K_FUNCIONARIO_COOPERATIVO,K_FUNCIONARIO_ESPERTO,K_FUNCIONARIO_MOTIVADO];

    # Método que adiciona apenas funcioários que segue o parâmetro de qualidade.
    public function addFuncionario($funcionario)
    {
        if(in_array($funcionario->getTipo(),$this->qualidades))
        {
            $this->funcionarios[] = $funcionario;
        }
    }

}
