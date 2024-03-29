<?php

    date_default_timezone_set('America/Recife');
    session_start();
    $_SESSION['nomeUsuario'] = "TALES ANDRADE";

    include 'lib/Funcionarios.php';
    include 'lib/Empresa.php';
    include 'lib/Funcionario.php';
    include 'lib/Pagina.php';

    $funcionarios = new Funcionarios();
    $empresa = new Empresa(1);
    $conteudo = '';

    //adiciona funcionários a empresa.
    while ($funcionario = $funcionarios->pegarFuncionario()) {
        $empresa->addFuncionario($funcionario);
    }
    $arFuncionarios = $empresa->getFuncionarios();

    //gera a listagem, bom gerar função/método específico.
    $htmlConteudo = '';
    foreach ($arFuncionarios as $funcionario) {
        $htmlConteudo .= "<a href='funcionario.php?id=" . $funcionario->getId() . "'>" . $funcionario->getId() . " - " . $funcionario->getNome() . '</a><br>';
    }

    # Empresa Ticker And Go
    $empresaTicketAndGo = new TicketAndGo(2);
    $funcionariosTicketAndGo = new Funcionarios();
    while ($funcionarioTicketAndGo = $funcionariosTicketAndGo->pegarFuncionario()) {
        $empresaTicketAndGo->addFuncionario($funcionarioTicketAndGo);
    }
    $arFuncionariosTicketAndGo = $empresaTicketAndGo->getFuncionarios();
    
    $htmlConteudo .= "<br/>";
    $htmlConteudo .= "<h3>Funcionários da Ticket And Go</h3><br/>";

    foreach ($arFuncionariosTicketAndGo as $funcionarioTicketAndGo) {
        $htmlConteudo .= "<a href='funcionario.php?id=" . $funcionarioTicketAndGo->getId() . "'>" . $funcionarioTicketAndGo->getId() . " - " . $funcionarioTicketAndGo->getNome() . '</a><br>';
    }

    #Porcentagens
    $htmlConteudo .= "<br/>";
    $htmlConteudo .= "<h3>Porcentagens dos tipos</h3><br/>";

    $quantidadeTipos = array_count_values(array_column($arFuncionarios, 'tipo'));
    $totalFuncionarios = count($arFuncionarios);
    foreach ($quantidadeTipos as $tipo => $qtd) {
        $htmlConteudo .= $funcionario->retornaTipo($tipo).": ".round(($qtd*100)/$totalFuncionarios,2)."%<br/>";
    }


    $pagina = new Pagina('Página 1 - Lista de Funcionários Disponíveis');
    $pagina->setNomeUsuario($_SESSION['nomeUsuario']);
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();
