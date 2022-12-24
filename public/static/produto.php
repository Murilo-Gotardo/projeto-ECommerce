<?php
include "../incs/header.php";
include "../src/ProdutoDAO.php";

$produtoDAO = new ProdutoDAO;
$idProduto = $_GET['idproduto'];
$produto = $produtoDAO->consultarProdutosId($idProduto);
$produtoDAO->aumentarView($idProduto);
$view = $produtoDAO->consultarView($idProduto);
$tamanho_imagem = $produtoDAO->consultarTamanhoImagem($idProduto);
?>
<main class="containerF my-5">
    <form action="carrinho.php" method="POST">
        <input type="hidden" name="idproduto" value="<?= $produto['idproduto'] ?>">
        <input type="hidden" name="operacao" value="inserir">
        <h2><?= $produto['titulo'] ?></h2>

        <div class="mb-5 envolve">
            <img src="data:image/png;base64,<?= base64_encode($produto['imagem']) ?>" loading="lazy" class="img-produto" alt="...">

        </div>


        <div class="informa p-3">
            <div class="d-flex flex-row align-items-center">
                <li class="d-flex align-items-center">
                    <p class="me-2 mb-0 ">Por:</p>
                    <p class="nomeArtistaP me-3 mb-0"><?= $produto['artista'] ?></p>
                </li>
                <p class="m-0">Publicado: <?= $produto['data_publi'] ?></p>
            </div>
            <div class="my-5">
                <p>DETALHES DA IMAGEM</p>
                <p>Image size (Px): <?= $produto['tamanho_imagem'] ?></p>
                <p>Image size (Kb): <?= number_format(($tamanho_imagem['tam'] / 1000), 2, ',', '.') ?></p>
            </div>
            <div>
                <h5 class="m-0">Valor: R$ <?= number_format($produto['valor'], 2, ',', '.') ?></h5>
            </div>
            <div class="mt-5">
                <h5 class="m-0">Views: <?= $view ?></h5>
            </div>
            <div class="p-produto d-flex justify-content-end">
                <button type="submit" class="btn-bo bo-link">Adicionar ao carrinho</button>
            </div>
        </div>

    </form>
</main>
<?php
include "../incs/footer.php";
