<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/unset.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap');
  </style>
  <script src="https://kit.fontawesome.com/bae5127ccf.js" crossorigin="anonymous"></script>
  <link rel="icon" href="img/iconezao.png">
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    ScrollReveal({
      reset: true
    });
  </script>
  <title>Lisbuy</title>
</head>

<body onload="loading()">
  <div id="load">
    <?php
    $num = rand(1,4);
    if ($num == 1) {
      echo "<img class='imgLoad' src='../img/taBebe.gif'>";
    } elseif ($num == 2) {
      echo "<img class='imgLoad' src='../img/k2cGuerreiro.gif'>";
    }elseif ($num == 3) {
      echo "<img class='imgLoad' src='../img/k2cRosa.gif'>";
    }elseif ($num == 4) {
      echo "<img class='imgLoad' src='../img/boceja.gif'>";
    }
    ?>
  </div>
  <div id="sideNav" class="sidenav">
    <span class="closebtn pointer" onclick="closeNav()"><i class="fa-solid fa-angle-left"></i></span>
    <ul>

      <li><a class="linkNav" aria-current="page" href="home.php">Home</a></li>
      <hr>
      <li><a class="linkNav" href="categoria.php?idcategoria=0">Em destaque</a></li>
      <li><a class="linkNav" href="categoria.php?idcategoria=1">Complex</a></li>
      <li><a class="linkNav" href="categoria.php?idcategoria=2">Landscapes</a></li>
      <li><a class="linkNav" href="categoria.php?idcategoria=3">Headshots</a></li>
      <li><a class="linkNav" href="categoria.php?idcategoria=4">Bodyshots</a></li>
      <li><a class="linkNav" href="admin/form_login.php" target="blank">Admin</a></li>
    </ul>
  </div>

  <header class="py-2">
    <div class="containerF d-flex justify-content-between">
      <div class="d-flex align-items-center">
        <i id="open" class="fa-solid fa-bars menu" onclick="openNav()"></i>
        <div class="ms-5 d-flex align-items-center">
          <a href="home.php"><img src="img/iconezao.png" loading="lazy" alt="" width="50px"></a>
          <h2 class="m-0 d-inline-flex ms-5 pt-1 h2-header">Lisbuy</h2>
        </div>
      </div>

      <div>
        <nav class="navbar navbar-expand-lg d-inline-flex">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="home" aria-current="page" href="home.php">Home</a>
                </li>
              </ul>
              <form action="pesquisa.php" class="d-flex">
                <input class="formP me-2" name="key" type="search" placeholder="" aria-label="Search">
                <button class="btn-borda-he" type="submit"><i class="fa-solid fa-magnifying-glass icone-pes"></i></button>
              </form>
            </div>
          </div>
          <a href="carrinho.php" class="navegacaoLinkIcone ms-3"><i class="fa-solid fa-basket-shopping d-flex"></i></a>
          <a href="login.php" class="navegacaoLinkIcone ms-2"><i class="fa-solid fa-user-lock d-flex "></i></a>
        </nav>
      </div>
    </div>
  </header>