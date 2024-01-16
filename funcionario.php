<?php
    session_start();

    /**
    *Mostra todos os dados do funcionário de acordo com o id recebido por get.
    *Deve mostrar o nome do usuário que está fazendo o teste, como registrado na sessão.
    *Deve conter um link que volta para a listagem.
    */

    include 'lib/Funcionarios.php';
    include 'lib/Funcionario.php';
    include 'lib/Empresa.php';
    include 'lib/Pagina.php';

    $funcionarios = new Funcionarios();
    $funcionario = $funcionarios->pegarFuncionarioPorId($_GET['id']);

    $htmlConteudo = '';
    $htmlConteudo .= "ID: " . $funcionario->getId() . "<br/>";
    $htmlConteudo .= "Nome: " . $funcionario->getNome() . "<br/>";
    $htmlConteudo .= "Tipo: " .  $funcionario->retornaTipo($funcionario->getTipo()). "<br/>";
    $htmlConteudo .= "<button onclick='history.back()'>Voltar</button>";


    $pagina = new Pagina('página 2 - Funcionário');
    $pagina->setNomeUsuario($_SESSION['nomeUsuario']);
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();
