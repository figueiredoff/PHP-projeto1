<?php

    require_once "config.inc.php";
    $id = $_GET["id"];
    $sql = "DELETE FROM orcamento WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<br><br>Orçamento excluído com sucesso!";
        echo "<a href='?pg=orçamentos-admin'>Voltar</a>";
    }else{
        echo "Erro ao excluir orçamento!";
    }

    mysqli_close($conexao);

