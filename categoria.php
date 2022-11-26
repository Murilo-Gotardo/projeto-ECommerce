<?php
include "incs/header.php";
require_once "src/ProdutoDAO.php";
$produtoDAO = new ProdutoDAO;
$idCategoria = $_GET['idcategoria'];

if ($idCategoria != 0) {
    $produtos = $produtoDAO->consultarPorCategoria($idCategoria);
    $categoria = $produtoDAO->consultarCategoria($idCategoria);
} else {
    $produtos = $produtoDAO->consultarProdutos();
    $categoria['categoria'] = "Destaques";
}

$carrinho = $_SESSION['carrinho'] ?? [];
?>

<main class="containerF my-5">
    <div class="d-flex justify-content-center div-t">
        <div>
            <h2 class="tituloCategoria titulao m-0"><?= $categoria['categoria'] ?></h2>
            <div class="traco"></div>

        </div>
    </div>

    <div class="galeria">

        <?php
        $cont = 0;
        foreach ($produtos as $produto) {
            if ($idCategoria == 0) {
                $view = $produtoDAO->consultarView($produto['idproduto']);
                if ($view > 15) {
        ?>
                    <div onclick="abre()" class="single-galeria">


                        <img class="img" src="data:image/png;base64,<?= base64_encode($produto['imagem']) ?>" loading="lazy" alt="...">

                        <a href="#img<?= $cont ?>">
                            <div class="overflow"></div>
                        </a>


                        <div class="conteudo">

                            <div class="informacoes-imagem">
                                <h5 class="title"><?= $produto['titulo'] ?></h5>
                                <p class="tamanho_imagem m-0"><?= $produto['tamanho_imagem'] ?></p>
                            </div>

                            <div class="div-m d-flex justify-content-between">
                                <p class="valor m-0">Valor: R$<?= number_format($produto['valor'], 2, ',', '.') ?></p>
                                <?php
                                $existe = false;
                                foreach ($carrinho as $i => $item) {
                                    if ($produto['idproduto'] == $item['idproduto']) {
                                        $existe = true;
                                    }
                                }
                                if ($existe == true) {
                                ?>
                                    <a class="btn-bo">Produto no carrinho</a>
                                <?php
                                } else 
                                if ($existe == false) {
                                ?>
                                    <a href="produto.php?idproduto=<?= $produto['idproduto'] ?>" class="btn-bo">Comprar licença</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div onclick="abre()" class="single-galeria">


                    <img class="img" src="data:image/png;base64,<?= base64_encode($produto['imagem']) ?>" loading="lazy" alt="...">

                    <a href="#img<?= $cont ?>">
                        <div class="overflow"></div>
                    </a>


                    <div class="conteudo">

                        <div class="informacoes-imagem">
                            <h5 class="title"><?= $produto['titulo'] ?></h5>
                            <p class="tamanho_imagem m-0"><?= $produto['tamanho_imagem'] ?></p>
                        </div>

                        <div class="div-m d-flex justify-content-between">
                            <p class="valor m-0">Valor: R$<?= number_format($produto['valor'], 2, ',', '.') ?></p>
                            <?php
                            $existe = false;
                            foreach ($carrinho as $i => $item) {
                                if ($produto['idproduto'] == $item['idproduto']) {
                                    $existe = true;
                                }
                            }
                            if ($existe == true) {
                            ?>
                                <a class="btn-bo">Produto no carrinho</a>
                            <?php
                            } else 
                            if ($existe == false) {
                            ?>
                                <a href="produto.php?idproduto=<?= $produto['idproduto'] ?>" class="btn-bo">Comprar licença</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
        <?php
            }

            $imagens[] = $produto['imagem'];
            $cont++;
        }
        ?>
    </div>
    <?php
    for ($i = 0; $i < $cont; $i++) {
    ?>
        <div class="lbox" id="img<?= $i ?>">

            <i onclick="fecha()" id="close" class="fa-solid fa-xmark b"></i>
            <img class="img" src="data:image/png;base64,<?= base64_encode($imagens[$i]) ?>" loading="lazy" alt="...">

        </div>
    <?php
    }
    ?>
    </div>
</main>

<?php
include "incs/footer.php";
?>