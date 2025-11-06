<?php

    require_once "config.inc.php";
    $id = $_GET["id"];
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<br>Registro excluido com sucesso!<br>";
        echo "<a href='?pg=clientes-admin'>Voltar</a>";
    }else{
        echo "Erro ao excluir registro!";
    }

    mysqli_close($conexao);

