<?php
    include "topo.php"; 
    require_once "src/ProdutoDAO.php";

    $produtoDAO = new ProdutoDAO();
    $produtoDAO->editarProduto($_POST);

    echo "<h3>Produto editado com sucesso!</h3>";

    include "rodape.php";
?>