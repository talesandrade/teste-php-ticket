<?php

class Pagina
{
    public $nomeUsuario = '???';
    public $tituloPagina;
    public $conteudo;


    # Método construtor da classe que define o título da página ao ser instanciada.
    public function __construct($tituloPagina)
    {
        $this->tituloPagina = $tituloPagina;
    }

    # Método que define o nome do usuário.
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    #Método que define o conteúdo da página.
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    #Método que cria o cabeçalho inicial da página e exibe em seguida o conteúdo.
    public function mostrar()
    {
        $stHtml = "<body><header><div style='width:100%; text-align:center; height:40px;'> 
				TESTE DE ADMISSÃO DE " . $this->nomeUsuario . '<br>' . $this->tituloPagina . '
			</div></header>';
        $stHtml .= $this->conteudo;
        $stHtml .= "<footer><div style='background-color:eeeeff; width:100%; text-align:center; height:20px;'>
        ". date('d/m/Y H:i:s')."
        </div></footer></body>";
        echo $stHtml;
    }
}
