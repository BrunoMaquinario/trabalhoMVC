<?php
require_once '../autoload.php';

$produtoController = new ProdutoController();
$produtos = $produtoController->index();
?>

<h1>Lista de Produtos</h1>
<a href="../views/produtos/create.php">Adicionar Produto</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>EAN</th>
        <th>Categoria</th>
        <th>Ações</th>
    </tr>
    <?php while ($produto = $produtos->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $produto['id'] ?></td>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= $produto['quantidade'] ?></td>
        <td><?= $produto['ean'] ?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td>
            <a href="edit.php?id=<?= $produto['id'] ?>">Editar</a>
            <a href="delete.php?id=<?= $produto['id'] ?>">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
