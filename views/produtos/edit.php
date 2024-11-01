<?php

require_once '../autoload.php';

$id = $_GET['id'];
$produtoController = new ProdutoController();
$categoriaController = new CategoriaController();

// Obtenha os dados do produto pelo ID para pré-preencher o formulário
$produto = $produtoController->show($id);

// Obtenha todas as categorias para preencher o campo de seleção
$categorias = $categoriaController->index()->fetchAll();
?>

<h1>Editar Produto</h1>
<form action="../../public/index.php?controller=Produto&action=update&id=<?= $id ?>" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?= $produto['nome'] ?>" required>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required>

    <label for="quantidade">Quantidade:</label>
    <input type="number" id="quantidade" name="quantidade" value="<?= $produto['quantidade'] ?>" required>

    <label for="ean">EAN:</label>
    <input type="text" id="ean" name="ean" value="<?= $produto['ean'] ?>" required>

    <label for="categoria_id">Categoria:</label>
    <select id="categoria_id" name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $produto['categoria_id'] ? 'selected' : '' ?>>
                <?= $categoria['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Salvar</button>
</form>
<a href="index.php">Voltar para a lista</a>
