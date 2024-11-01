<?php
require_once '../autoload.php';

class Produto {
    private $conn;
    private $table_name = "produtos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT p.*, c.nome AS categoria_nome FROM " . $this->table_name . " p LEFT JOIN categorias c ON p.categoria_id = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function show($id) {
        $query = "SELECT * FROM ". $this->table_name. "WHERE id = ". $id;
    }

    public function create($nome, $preco, $quantidade, $ean, $categoria_id) {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, preco=:preco, quantidade=:quantidade, ean=:ean, categoria_id=:categoria_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":ean", $ean);
        $stmt->bindParam(":categoria_id", $categoria_id);
        return $stmt->execute();
    }

    public function update($id, $nome, $preco, $quantidade, $ean, $categoria_id) {
        $query = "UPDATE " . $this->table_name . " SET nome=:nome, preco=:preco, quantidade=:quantidade, ean=:ean, categoria_id=:categoria_id WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":ean", $ean);
        $stmt->bindParam(":categoria_id", $categoria_id);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
