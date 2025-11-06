<?php

    require_once "config.inc.php";

    $sql = "SELECT 
                o.id, 
                o.valor,
                c.cliente,
                CASE o.tipo
                    WHEN 1 THEN 'Compra'
                    WHEN 2 THEN 'Manutenção corretiva'
                    WHEN 3 THEN 'Manutenção preventiva'
                    ELSE 'Tipo desconhecido'
                END AS tipo_descricao
            FROM 
                orcamento AS o
            INNER JOIN 
                clientes AS c ON o.cliente_id = c.id
            ORDER BY 
                o.id DESC";

    $resultado = mysqli_query($conexao, $sql);

    echo "<h2>Lista de Orçamentos</h2><hr>";

    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {
            echo "ID: " . $dados['id'] . "<br>";
            echo "Cliente: " . $dados['cliente'] . "<br>";
            echo "Tipo: " . $dados['tipo_descricao'] . "<br>";
            echo "Valor: " . $dados['valor'] . "<br>";           
            echo "<a href='?pg=orcamentos-form-alterar&id=$dados[id]'>Editar</a>";
            echo " | <a href='?pg=orcamentos-excluir&id=$dados[id]'>Excluir</a>";
            echo "<hr>";
        }
    }else{
        echo "<br>Nenhum orçamento cadastrado!<br>";
        echo "<a href='?pg=orcamentos-form'>Novo orçamento</a>";
    }
    
    mysqli_close($conexao);
