<?php

    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cliente_id = $_POST["cliente_id"];
        $valor = $_POST["valor"];
        $tipo = $_POST["tipo"];

        $sql = "INSERT INTO orcamento (cliente_id, valor, tipo)
                VALUES ('$cliente_id', '$valor', '$tipo')";
        if(mysqli_query($conexao, $sql)){
            echo "<h3>Orçamento cadastrado com sucesso!</h3>";
            echo "<a href='?pg=orcamentos-admin'>Voltar</a>";
        }else{
            echo "<h3>Erro ao cadastrar orcamento!</h3>";
        }
    }else{
        echo "<h2>Acesso negado!</h2>";
        echo "<a href='?pg=orcamentos-admin'>Voltar</a>";
    }

    mysqli_close($conexao);