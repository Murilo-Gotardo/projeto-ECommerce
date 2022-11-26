<?php
    include "topo.php";
    require_once "src/CategoriaDAO.php";
    require_once "src/ConexaoBD.php";
    require_once "src/ProdutoDAO.php";

    $produtoDAO = new ProdutoDAO();
    $produto = $produtoDAO->consultarProdutosId($_GET['idproduto']);
?>

<h3 class="mt-2 mb-5">Edição dos Produtos</h3>
<form method="POST" enctype="multipart/form-data" action="edita_produto.php" class="container bg-secondary w-75 p-5">
    
    <input type="hidden" name="idproduto" value="<?=$_GET['idproduto']?>">

    <div class="mb-3">
        <label for="tituloid" class="form-label">Título</label>
        <input type="text" name="titulo" id="tituloid" class="form-control" value="<?=$produto['titulo']?>">
    </div>

    <div class="mb-3">
        <label for="artistaid" class="form-label">Artista</label>
        <input type="text" name="artista" id="artistaid" class="form-control" value="<?=$produto['artista']?>">
    </div>

    <div class="mb-3">
        <label for="estiloid" class="form-label">Categoria</label>
        <select name="idcategoria" id="estiloid" class="form-select">
            <?php
                //consultar
                $categoriaDAO = new CategoriaDAO();
                $categorias = $categoriaDAO->consultarCategoria();

                //listar
                $selected = "";
                foreach ($categorias as $categoria) {
                    if ($produto['idcategoria'] == $categoria['idcategoria']) {
                        $selected = "SELECTED";
                    }
                    echo "<option $selected value='{$categoria['idcategoria']}'>{$categoria['categoria']}</option>";
                }

            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="anoLancamentoid" class="form-label">Tamanho da imagem (em pixel X pixel)</label>
        <input type="text" name="tamanho_imagem" id="anoLancamentoid" class="form-control" value="<?=$produto['tamanho_imagem']?>">
    </div>

    <div class="mb-3">
        <label for="valorid" class="form-label">Valor (R$)</label>
        <input type="text" name="valor" id="valorid" class="form-control" value="<?=$produto['valor']?>">
    </div>

    <div class="mb-3">
        <label for="anoLancamentoid" class="form-label">Data de publicação (mês dia, ano)</label>
        <input type="text" name="data_publi" id="anoLancamentoid" value="<?=$produto['data_publi']?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="imagemid" class="form-label">Arte</label>
        <input type="file" name="imagem" id="imagemid" class="form-control">
    </div>   

    <button type="submit">Salvar alterações</button>
        
</form>

<?php
    include "rodape.php";
?>