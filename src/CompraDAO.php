<?php
require_once "ConexaoBD.php";

class CompraDAO{

    public function registrarCompra($dados){
        $conexao = ConexaoBD::getConexao();

        $data = date("Y-m-d H:i");

        $sql = "INSERT INTO compra (idusuario, dataCompra) VALUES ('{$dados['idusuario']}', '$data')";

        $conexao->exec($sql);
        $idCompra = $conexao->lastInsertId();

        $carrinho = $dados['carrinho'];
        foreach ($carrinho as $item) {
            
            $sql = "INSERT INTO item_compra (idcompra, idproduto, valor) VALUES ('$idCompra', '{$item['idproduto']}', {$item['valor']})";

            $conexao->exec($sql);
        }
    }
}
