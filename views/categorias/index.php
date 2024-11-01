<?php
require_once '../autoload.php';

$categoriaController = new CategoriaController();
$categorias = $categoriaController->index();
?>

<h1>Lista de Categorias</h1>
<a href="create.php">Adicionar Categoria</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <?php while ($categoria = $categorias->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $categoria['id'] ?></td>
        <td><?= $categoria['nome'] ?></td>
        <td>
            <a href="edit.php?id=<?= $categoria['id'] ?>">Editar</a>
            <a href="delete.php?id=<?= $categoria['id'] ?>">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
