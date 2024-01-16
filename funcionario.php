<?php
    session_start();
    
    /**
    *Mostra todos os dados do funcionário de acordo com o id recebido por get.
    *Deve mostrar o nome do usuário que está fazendo o teste, como registrado na sessão.
    *Deve conter um link que volta para a listagem.
    */

    include 'lib/Funcionario.php';
    include 'lib/Empresa.php';
    include 'lib/Pagina.php';

    $pagina = new Pagina('página 2 - Funcionário');
    $pagina->setNomeUsuario($_SESSION['nomeUsuario']);
    $htmlConteudo = '';
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();
