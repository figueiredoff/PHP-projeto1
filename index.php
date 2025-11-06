<?php

    include_once "topo.php";
    include_once "menu.php";

    // área de conteúdo
    if(empty($_SERVER['QUERY_STRING'])){
        $pg = "conteudo";
        include_once "$pg.php";
    }elseif($_GET['pg']) {
        $pg = "$_GET[pg]";
        include_once "$pg.php";
    }else{
        echo "Página não encontrada";

    }

    include_once "rodape.php";
