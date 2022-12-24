<?php
include "../incs/header.php";
require_once "../src/CompraDAO.php";

$compraDAO = new CompraDAO;

$compraDAO->registrarCompra($_SESSION);

?>

<main class="containerF">

    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">

            <h2 class="m-0">Obrigado pela compra</h2>
        </div>
        <div class="col-12 d-flex justify-content-center">

            <div class="my-5">
                <?php
                $num = rand(1, 6);
                if ($num == 1) {
                    echo "<img src='../img/final1.gif'>";
                } elseif ($num == 2) {
                    echo "<img src='../img/final2.gif'>";
                } elseif ($num == 3) {
                    echo "<img src='../img/final3.gif'>";
                } elseif ($num == 4) {
                    echo "<img src='../img/final4.jpg'>";
                } elseif ($num == 5) {
                    echo "<img src='../img/final5.png'>";
                } elseif ($num == 6) {
                    echo "<img src='../img/final6.png'>";
                }
                ?>
            </div>
        </div>

    </div>



</main>

<?php

include "../incs/footer.php";
?>