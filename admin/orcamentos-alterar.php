<?php

require_once "config.inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $cliente_id = $_POST["cliente_id"];
    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];
    $id = $_POST["id"];

    $sql = "UPDATE orcamento SET 
            cliente_id = '$cliente_id',
            tipo = '$tipo',
            valor = '$valor'
            WHERE id = '$id'";

    if(mysqli_query($conexao, $sql)){
        echo "<h3>Orçamento alterado com sucesso!</h3>";
        echo "<a href='?pg=orcamentos-admin'>Voltar</a>";
    }else{
        echo "<h3>Erro ao alterar orçamento!</h3>";
    }
}else{
    echo "<h2>Acesso negado!</h2>";
    echo "<a href='?pg=orcamentos-admin'>Voltar</a>";
}

mysqli_close($conexao);
?>