<?php

require_once "config.inc.php";

$id = $_GET['id'];

$sql_orcamento = "SELECT id, cliente_id, valor, tipo 
                  FROM orcamento 
                  WHERE id = $id";

$resultado_orcamento = mysqli_query($conexao, $sql_orcamento);
$dados_orcamento = mysqli_fetch_assoc($resultado_orcamento);

if (!$dados_orcamento) {
    echo "<h2>Nenhum orçamento encontrado!</h2>";
    mysqli_close($conexao);
    exit;
}

$sql_todos_clientes = "SELECT id, cliente FROM clientes ORDER BY cliente ASC";
$resultado_todos_clientes = mysqli_query($conexao, $sql_todos_clientes);

if (!$resultado_todos_clientes) {
    die("Erro ao buscar lista de clientes: " . mysqli_error($conexao));
}

?>

<h2>Alterar Orçamento</h2>
<form action="?pg=orcamentos-alterar" method="POST">

    <input type="hidden" name="id" value="<?= $dados_orcamento['id'] ?>">

    <label for="cliente_id">Cliente:</label><br>
    <select id="cliente_id" name="cliente_id" title="O cliente precisa estar cadastrado." required>
        <option value="">Selecione o cliente</option>
        
        <?php
        while ($cliente = mysqli_fetch_assoc($resultado_todos_clientes)) {
            $selecionado = ($cliente['id'] == $dados_orcamento['cliente_id']) ? 'selected' : '';
            $nome_limpo = htmlspecialchars($cliente['cliente']);
            
            echo "<option value=\"{$cliente['id']}\" $selecionado>$nome_limpo</option>";
        }
        mysqli_free_result($resultado_todos_clientes);
        ?>
    </select>
    <br><br>

    <label for="valor">Valor (R$):</label><br>
    <input type="number" id="valor" name="valor" 
           value="<?= $dados_orcamento['valor'] ?>" step="0.01" min="0" required>
    <br><br>

    <label for="tipo">Tipo:</label><br>
    <select id="tipo" name="tipo" required>
        <option value="">Selecione o tipo</option>
        
        <option value="1" <?= ($dados_orcamento['tipo'] == 1) ? 'selected' : '' ?>>Compra</option> 
        <option value="2" <?= ($dados_orcamento['tipo'] == 2) ? 'selected' : '' ?>>Manutenção corretiva</option>
        <option value="3" <?= ($dados_orcamento['tipo'] == 3) ? 'selected' : '' ?>>Manutenção preventiva</option>
    </select>
    <br><br>

    <button type="submit">Salvar Alterações</button>

</form>

<?php
    mysqli_close($conexao);
?>