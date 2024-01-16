<?php

define('K_FUNCIONARIO_MOTIVADO', 1);
define('K_FUNCIONARIO_ESPERTO', 2);
define('K_FUNCIONARIO_HONESTO', 3);
define('K_FUNCIONARIO_DESONESTO', 4);
define('K_FUNCIONARIO_PREGUICOSO', 5);
define('K_FUNCIONARIO_COOPERATIVO', 6);

class Funcionario
{
    public $id;
    public $nome;
    public $tipo;

    # Método construtor da classe que define id, nome e tipo do funcionário ao ser instânciada
    # e verifica se o tipo de funcionário informado é aceito.
    public function __construct($id, $nome, $tipo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        if ($tipo != K_FUNCIONARIO_MOTIVADO
           and $tipo != K_FUNCIONARIO_ESPERTO
           and $tipo != K_FUNCIONARIO_HONESTO
           and $tipo != K_FUNCIONARIO_HONESTO
           and $tipo != K_FUNCIONARIO_PREGUICOSO
           and $tipo != K_FUNCIONARIO_DESONESTO
           and $tipo != K_FUNCIONARIO_COOPERATIVO
        ) {
            trigger_error('Este tipo de funcionário não é aceito', E_USER_ERROR);
        }
    }

    # Método retorna o id do funcionário.
    public function getId()
    {
        return $this->id;
    }

    # Método retorna o nome do funcionário.
    public function getNome()
    {
        return $this->nome;
    }

    # Método retorna o tipo do funcionário.
    public function getTipo()
    {
        return $this->tipo;
    }

    #Métido que retorna o tipo do funcionário por extenso.
    public function retornaTipo($tipo)
    {
        switch ($tipo) {
            case K_FUNCIONARIO_MOTIVADO:
                return "Funcionário motivado";
                break;
            case K_FUNCIONARIO_ESPERTO:
                return "Funcionário esperto";
                break;
            case K_FUNCIONARIO_HONESTO:
                return "Funcionário honesto";
                break;
            case K_FUNCIONARIO_DESONESTO:
                return "Funcionário desonesto";
                break;
            case K_FUNCIONARIO_PREGUICOSO:
                return "Funcionário preguiçoso";
                break;
            case K_FUNCIONARIO_COOPERATIVO:
                return "Funcionário cooperativo";
                break;
            default:
                return "Tipo não localizado.";
                break;
        }
    }
}
