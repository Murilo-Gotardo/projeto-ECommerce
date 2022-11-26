<?php
include "topo.php";
require_once "src/ProdutoDAO.php";

$produtoDAO = new ProdutoDAO();
$produtoDAO->cadastrarProduto($_POST);
echo "<h3>Produto cadastrado com sucesso!</h3>";
?>
<a href="form_cadastro_produto.php"><button type="button">Cadastrar mais Produtos</button> </a> 
<?php


include "rodape.php";
