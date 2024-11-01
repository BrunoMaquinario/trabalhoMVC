<?php
require_once '../autoload.php';

$controller = $_GET['controller'] ?? 'Produto';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'Categoria':
        $categoriaController = new CategoriaController();
        if ($action == 'index') {
            include '../views/categorias/index.php';
        } elseif ($action == 'store') {
            $categoriaController->store($_POST['nome']);
            header("Location: ../views/categorias/index.php");
        } elseif ($action == 'update') {
            $categoriaController->update($_GET['id'], $_POST['nome']);
            header("Location: ../views/categorias/index.php");
        } elseif ($action == 'destroy') {
            $categoriaController->destroy($_GET['id']);
            header("Location: ../views/categorias/index.php");
        }
        break;

    case 'Produto':
        $produtoController = new ProdutoController();
        if ($action == 'index') {
            include '../views/produtos/index.php';
        } elseif ($action == 'store') {
            $produtoController->store($_POST['nome'], $_POST['preco'], $_POST['quantidade'], $_POST['ean'], $_POST['categoria_id']);
            header("Location: ../views/produtos/index.php");
        } elseif ($action == 'update') {
            $produtoController->update($_GET['id'], $_POST['nome'], $_POST['preco'], $_POST['quantidade'], $_POST['ean'], $_POST['categoria_id']);
            header("Location: ../views/produtos/index.php");
        } elseif ($action == 'destroy') {
            $produtoController->destroy($_GET['id']);
            header("Location: ../views/produtos/index.php");
        }
        break;

    default:
        echo "Controller not found.";
        break;
}
?>
