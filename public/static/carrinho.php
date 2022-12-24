<?php
include "../incs/header.php";
require_once "../src/ProdutoDAO.php";

$idProduto = $_REQUEST['idproduto'] ?? null;
$operacao = $_REQUEST['operacao'] ?? null;

$carrinho = $_SESSION['carrinho'] ?? [];

if ($operacao == 'inserir') {
  $item['idproduto'] = $idProduto;
  $item['quantidade'] = 1;
  $carrinho[] = $item;
} else {
  if ($operacao == "remover") {
    unset($carrinho[$idProduto]);
  }
}

$_SESSION['carrinho'] = $carrinho;

$cont = 0;
$contB = 1;

$valorTotal = 0;

$produtoDAO = new ProdutoDAO;
?>
<main class="containerF my-5">
  <section id="carrinho">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-inner">
        <?php
        foreach ($carrinho as $i => $item) {
          $produtoItem = $produtoDAO->consultarProdutosId($item['idproduto']);
          $item['valor'] = $produtoItem['valor'];
          $carrinho[$i] = $item;
          if ($cont == 0) {
        ?>
            <div class="carousel-item active">
              <div class="envolve">
                <img src="data:image/png;base64,<?= base64_encode($produtoItem['imagem']) ?>" class="d-block" width="100%" height="100%" alt="...">
                
              </div>
              <div class="carousel-caption faixa d-none d-md-block">
                <div class="d-flex">
                  <div class="w-100">
                    <h5 class="ms-5"><?= $produtoItem['titulo'] ?></h5>
                  </div>
                  <div class="flex-shrink-1 me-2 mt-2">
                    <a href="carrinho.php?idproduto=<?= $i ?>&operacao=remover" class="btn-bo px-3"><i class="fa-solid fa-minus"></i></i></a>
                  </div>
                </div>
                <p>Preço: R$ <?= number_format($produtoItem['valor'], 2, ',', '.') ?></p>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="carousel-item">
              <div class="envolve">

                <img src="data:image/png;base64,<?= base64_encode($produtoItem['imagem']) ?>" class="d-block" width="100%" height="100%" alt="...">
              </div>
              <div class="carousel-caption faixa d-none d-md-block">
                <div class="d-flex">
                  <div class="w-100">
                    <h5 class="ms-5"><?= $produtoItem['titulo'] ?></h5>
                  </div>
                  <div class="flex-shrink-1 me-2 mt-2">
                    <a href="carrinho.php?idproduto=<?= $i ?>&operacao=remover" class="btn-bo px-3"><i class="fa-solid fa-minus"></i></i></a>
                  </div>
                </div>
                <p>Preço: R$ <?= number_format($produtoItem['valor'], 2, ',', '.') ?></p>
              </div>
            </div>
        <?php
          }
          $cont++;
          $valorTotal += $produtoItem['valor'];
        }
        ?>
        <div class="carousel-indicators">
          <?php
          for ($i = 0; $i < $cont; $i++) {
            if ($contB == 1) {
          ?>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i ?>" class="active" aria-current="true"></button>
            <?php
              $contB++;
            } elseif ($cont != 1) {
            ?>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i ?>" aria-current="true"></button>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="mt-5 d-flex justify-content-center">
    <a href="finalizacaoDaCompra.php" class="btn-bo">Finalizar compra <br>
      <hr>

      <?php
      $_SESSION['valorTotal'] = $valorTotal;
      $_SESSION['carrinho'] = $carrinho;
      ?>
      Total: R$ <?= number_format($valorTotal, 2, ',', '.') ?>
    </a>
  </section>

</main>
<?php
include "../incs/footer.php";
