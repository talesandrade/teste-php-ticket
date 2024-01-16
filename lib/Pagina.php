<?php

class Pagina
{
    public $nomeUsuario = '???';
    public $tituloPagina;
    public $conteudo;


    public function __construct($tituloPagina)
    {
        $this->tituloPagina = $tituloPagina;
    }

    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    public function mostrar()
    {
        $stHtml = "<body></body><div style='background-color:eeeeff; width:100%; text-align:center; height:40px;'> 
				TESTE DE ADMISSÃO DE " . $this->nomeUsuario . '<br>' . $this->tituloPagina . '
			</div>';
        $stHtml .= $this->conteudo;
        echo $stHtml;
    }
}
