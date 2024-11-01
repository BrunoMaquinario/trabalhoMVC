<h1>Adicionar Produto</h1>
<form action="../../public/index.php?controller=Produto&action=store" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" step="0.01" required>

    <label for="quantidade">Quantidade:</label>
    <input type="number" id="quantidade" name="quantidade" required>

    <label for="ean">EAN:</label>
    <input type="text" id="ean" name="ean" required>

    <label for="categoria_id">Categoria:</label>
    <select id="categoria_id" name="categoria_id" required>
        <!-- Fetch categorias e exibe como opções -->
        <?php
        require_once '../../autoload.php';

        // Verifica se a classe CategoriaController existe
        if (class_exists('CategoriaController')) {
            $categoriaController = new CategoriaController();
            $categorias = $categoriaController->index();

            // Verifica se categorias foram retornadas
            if (!empty($categorias)) {
                foreach ($categorias as $categoria) {
                    echo "<option value=\"{$categoria['id']}\">{$categoria['nome']}</option>";
                }
            } else {
                echo "<option value=\"\">Nenhuma categoria disponível</option>";
            }
        } else {
            echo "<option value=\"\">Erro ao carregar categorias</option>";
        }
        ?>
    </select>
    
    <button type="submit">Salvar</button>
</form>

<a href="index.php">Voltar para a lista</a>