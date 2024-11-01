<?php
require_once '../../controllers/CategoriaController.php';

$id = $_GET['id'];
$categoriaController = new CategoriaController();
$categoria = $categoriaController->index()->fetchAll()[0];
?>

<h1>Editar Categoria</h1>
<form action="../../public/index.php?controller=Categoria&action=update&id=<?= $id ?>" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?= $categoria['nome'] ?>" required>
    <button type="submit">Salvar</button>
</form>
<a href="index.php">Voltar para a lista</a>
