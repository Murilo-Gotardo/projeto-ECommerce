<?php
require_once "ConexaoBD.php";

class CategoriaDAO{
    function consultarCategoria(){
        $conexao = ConexaoBD::getConexao();
        $sql = "select * from categoria";

        $resultado = $conexao->query($sql);

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>