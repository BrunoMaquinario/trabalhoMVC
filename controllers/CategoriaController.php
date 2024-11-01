<?php

require_once '../autoload.php';

class CategoriaController {
    private $categoria;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->categoria = new Categoria($db);
    }

    public function index() {
        return $this->categoria->getAll();
    }

    public function store($nome) {
        return $this->categoria->create($nome);
    }

    public function update($id, $nome) {
        return $this->categoria->update($id, $nome);
    }

    public function destroy($id) {
        return $this->categoria->delete($id);
    }
}
?>
