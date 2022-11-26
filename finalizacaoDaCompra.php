<?php
include "incs/header.php";
require_once "src/UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO;
$usuario = $usuarioDAO->consultarUsuario("murilo@gmail.com");

$_SESSION['idusuario'] = $usuario['idusuario'];
?>

<main class="containerF my-5">
  <section>
    <h2>Finalização da compra</h2>
    <form action="finalizar.php">
      <div class="card pa-f d-flex justify-content-center">
        <div class="row">

          <div class="my-5 col-6">
            <p class="sobrenome mb-5">Prezado usuario <?= $usuario['nomeUsuario'] ?>, você está prestes a efetuar uma compra</p>
            <p>Email pessoal: <?= $usuario['email'] ?></p>
            <p>Total a pagar: R$ <?= number_format($_SESSION['valorTotal'], 2, ',', '.') ?></p>
            <div class="p-produto">
              <button type="submit" class="btn-bo bo-link">Pagar</button>
            </div>
          </div>

          <div class="col-6 d-flex justify-content-center">
            <img src="img/gastaCoiso.gif" alt="">
          </div>
        </div>
      </div>
    </form>
  </section>
</main>
<?php
include "incs/footer.php";
