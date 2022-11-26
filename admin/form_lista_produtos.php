<?php
include "topo.php";
require_once "src/ProdutoDAO.php";
?>
<form class="container border rounded p-3" action="form_lista_produtos.php">
    <div class="mb-2">
        <label for="">Busca</label>
        <input type="text" name="key" class="form-control">
    </div>
    <div>
        <button type="submit" class="btn btn-secondary">Pesquisar</button>
    </div>

</form>
<div class="container">

    <table>
        <tr>
            <th>Artista</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Tamanho da imagem</th>
            <th>Data de publicação</th>
        </tr>
        <?php
        $produtoDAO = new ProdutoDAO();


        if (isset($_GET['idproduto'])) {
            $idproduto = $_GET['idproduto'];
            $idView = $produtoDAO->consultaIdView($idproduto);
            $produtoDAO->removerProduto($idproduto, $idView);
        }

        if (isset($_GET['key'])) {
            $produtos = $produtoDAO->consultarPorChave($_GET['key']);
        } else {
            $produtos = $produtoDAO->consultarProdutos();
        }
        

        foreach ($produtos as $produto) :
        ?>
            <tr>
                <td><?= $produto['titulo'] ?></td>
                <td><?= $produto['artista'] ?></td>
                <td><?= $produto['categoria'] ?></td>
                <td><?= $produto['valor'] ?></td>
                <td><?= $produto['tamanho_imagem'] ?></td>
                <td><?= $produto['data_publi'] ?></td>
                <td>
                    <a href="form_edicao_produto.php?idproduto=<?= $produto['idproduto'] ?>" class="btn btn-info btn-sm">Editar</a>
                    <a href="form_lista_produtos.php?idproduto=<?= $produto['idproduto'] ?>" class="btn btn-danger btn-sm">Remover</a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</div>


<?php
include "rodape.php";
?>