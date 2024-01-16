<?php

class Funcionarios
{
    public $funcionarios = [];
    public $indice = 0;

    # Método construtor da classe que popula a lista de funcionários disponíveis para contratação.
    public function __construct()
    {
        $x = 0;
        $this->funcionarios[] = new Funcionario($x++, 'Zé', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Mario Prata', K_FUNCIONARIO_ESPERTO);
        $this->funcionarios[] = new Funcionario($x++, 'João Souza', K_FUNCIONARIO_HONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Maria Ambrosia', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Carlos Santos', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Francisco da Cunha', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Godofredo Ansdruval', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Marcoleidson Froga', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Carmem de Sá', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Chica da Silva', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Francinaldo Andrades de Ló', K_FUNCIONARIO_DESONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Carmiro José', K_FUNCIONARIO_DESONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'José Maria', K_FUNCIONARIO_HONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Dinho', K_FUNCIONARIO_DESONESTO);

        $this->importarFuncionarios($x);
    }

    #Método retorna todos os funcionários disponíveis um por vez.
    public function pegarFuncionario()
    {
        if (isset($this->funcionarios[$this->indice])) {
            return $this->funcionarios[$this->indice++];
        }
    }

    # Método que retorna apenas o funciorário do referente ao id informado.
    public function pegarFuncionarioPorId($id)
    {
        if(isset($this->funcionarios[$id-1]))
        {
            return $this->funcionarios[$id-1];

        }else{

           return('Este funcionário não está disponível.');
           
        }
    }

    public function importarFuncionarios($ultimoId)
    {
        $funcionarios = file("candidatos.dump", FILE_IGNORE_NEW_LINES);

        foreach ($funcionarios as $linha) {

            $primeiroChar = substr($linha, 0, 1);

            if($primeiroChar != "#" && $primeiroChar != ""){
                $funcionarioImportado = explode("\t",$linha);
                $this->funcionarios[] = new Funcionario($ultimoId, $funcionarioImportado[1], $this->converterTipo($funcionarioImportado[2]));
                $ultimoId++;
            }

        }

        return $this->funcionarios;
    }

    public function converterTipo($tipo)
    {
        switch ($tipo) {
            case 'm':
                return 1;
                break;
            case 'e':
                return 2;
                break;
            case 'h':
                return 3;
                break;
            case 'd':
                return 4;
                break;
            case 'p':
                return 5;
                break;
            case 'c':
                return 6;
                break;
        }
    }
}
