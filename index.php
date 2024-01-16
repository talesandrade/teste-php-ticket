<?php

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
        $htmlConteudo .= "<a href='funcionario.php?id=" . $funcionario->getId() . "'>" . $funcionario->getId() . '</a><br>';
    }



    $pagina = new Pagina('Página 1 - Lista de Funcionários Disponíveis');
    //$pagina->setNomeUsuario();
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();
