<?php
include "incs/header.php";
require_once "src/ProdutoDAO.php";

$carrinho = $_SESSION['carrinho'] ?? [];
?>
<!--Inicio do carrosel-->

<div id="carouselExampleDark" id="carouselP" class="carousel carousel-dark slide my-5" data-bs-ride="carousel">
  <div class="carousel-inner">

    <?php
    $cont = 1;
    $produtoDAO = new ProdutoDAO;
    $carrosel = $produtoDAO->consultarProdutos();
    foreach ($carrosel as $produto) {
      $view = $produtoDAO->consultarView($produto['idproduto']);
      if ($view > 20) {
        if ($cont == 1) {
    ?>
          <div class="carousel-item active">
            <a href="produto.php?idproduto=<?= $produto['idproduto'] ?>"><img src="data:image/png;base64,<?= base64_encode($produto['imagem']) ?>" loading="lazy" class="d-block w-100 cobre" alt="..."></a>

          </div>
        <?php
          $cont++;
        } else {
        ?>
          <div class="carousel-item">
            <a href="produto.php?idproduto=<?= $produto['idproduto'] ?>"><img src="data:image/png;base64,<?= base64_encode($produto['imagem']) ?>" loading="lazy" class="d-block w-100 cobre" alt="..."></a>
          </div>
    <?php
        }
      }
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--fim do carrosel-->

<?php
$destaques = $produtoDAO->consultarProdutos();
?>

<main class="containerF mb-5">
  <!--Inicio dos em destaque-->

  <section id="emDestaque">
    <div class="mb-3">
      <h2 class="tituloCategoria m-0">Em destaque</h2>
      <div class="traco"></div>
    </div>
    <div class="galeria">
      <?php
      $cont = 0;
      foreach ($destaques as $produto) {
        $view = $produtoDAO->consultarView($produto['idproduto']);
        if ($view > 10) {
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

          $imagens[] = $produto['imagem'];
          $cont++;
        }
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
  </section>
  <!--Fim dos em destaques-->

  <!--Inicio das Landscapes-->
  <section class="mt-5" id="landscapes">
    <div class="mb-3">
      <h2 class="tituloCategoria m-0">Landscapes</h2>
      <div class="traco"></div>
    </div>

    <div class="galeria">

      <?php
      $landScapes = $produtoDAO->consultarPorCategoria(2);

      foreach ($landScapes as $produto) {
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
  </section>
  <!--Fim das Landscapes-->

  <!--headshots-->
  <section class="mt-5" id="head">
    <div class="mb-3">
      <h2 class="tituloCategoria m-0">Headshots</h2>
      <div class="traco"></div>
    </div>

    <div class="galeria">

      <?php
      $headShots = $produtoDAO->consultarPorCategoria(3);

      foreach ($headShots as $produto) {
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
  </section>
  <!--Fim dos headshots-->
  <section class="mt-5" id="body">
    <div class="mb-3">
      <h2 class="tituloCategoria m-0">Bodyshots</h2>
      <div class="traco"></div>
    </div>

    <div class="galeria">

      <?php
      $bodyShots = $produtoDAO->consultarPorCategoria(4);

      foreach ($bodyShots as $produto) {
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
  </section>
</main>
<?php
include "incs/footer.php";
