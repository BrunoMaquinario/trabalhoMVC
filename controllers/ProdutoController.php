<?php

require_once '../autoload.php';

class ProdutoController {
    private $produto;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->produto = new Produto($db);
    }

    public function index() {
        return $this->produto->getAll();
    }

    public function show($id) {
        return $this->produto->show($id);
    }

    public function store($nome, $preco, $quantidade, $ean, $categoria_id) {
        return $this->produto->create($nome, $preco, $quantidade, $ean, $categoria_id);
    }

    public function update($id, $nome, $preco, $quantidade, $ean, $categoria_id) {
        return $this->produto->update($id, $nome, $preco, $quantidade, $ean, $categoria_id);
    }

    public function destroy($id) {
        return $this->produto->delete($id);
    }
}
?>
