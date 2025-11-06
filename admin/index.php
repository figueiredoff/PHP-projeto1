<?php

    echo "<h1>Painel administrativo</h1>";

    echo "<a href='?pg=clientes-admin'>Listar Clientes</a> | ";
    echo "<a href='?pg=clientes-form'>Cadastrar Cliente</a> | ";
    echo "<a href='?pg=orcamentos-admin'>Listar Orçamentos</a> | ";
    echo "<a href='?pg=orcamentos-form'>Cadastrar Orçamento</a>";

    // área de conteúdo
    if(empty($_SERVER['QUERY_STRING'])){
       echo "<h3>Bem-vindo ao painel admin.";
    }else {
        $pg = "$_GET[pg]";
        include_once "$pg.php";
    }

