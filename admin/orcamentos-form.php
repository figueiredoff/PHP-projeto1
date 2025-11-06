<?php

require_once 'config.inc.php';

$sql_clientes = "SELECT id, cliente FROM clientes ORDER BY cliente ASC";
$resultado_clientes = mysqli_query($conexao, $sql_clientes);

if (!$resultado_clientes) {
    die("Erro ao buscar clientes: " . mysqli_error($conexao));
}

?>

<h2>Cadastro de Orçamentos</h2>
<form action="?pg=orcamentos-cadastro" method="POST">

    <label for="cliente_id">Cliente:</label><br>
    <select id="cliente_id" name="cliente_id" title="O cliente precisa estar cadastrado." required>
        <option value="">Selecione o cliente</option>
        
        <?php

        while ($cliente = mysqli_fetch_assoc($resultado_clientes)) {
            $id_cliente = htmlspecialchars($cliente['id']);
            $nome_cliente = htmlspecialchars($cliente['cliente']);
            
            echo "<option value=\"$id_cliente\">$nome_cliente</option>";
        }
        
        mysqli_free_result($resultado_clientes);
        ?>

    </select>
    <br><br>

    <label for="valor">Valor (R$):</label><br>
    <input type="number" id="valor" name="valor" step="0.01" min="0" required>
    <br><br>

    <label for="tipo">Tipo:</label><br>
    <select id="tipo" name="tipo" required>
        <option value="">Selecione o tipo</option>
        <option value="1">Compra</option> 
        <option value="2">Manutenção corretiva</option>
        <option value="3">Manutenção preventiva</option>
    </select>
    <br><br>

    <button type="submit">Salvar</button>

</form>