<?php
require_once "ConexaoBD.php";

class UsuarioAdminDAO {

    function consultarUsuario($nomeUsuario, $senha) {
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT * FROM usuarioadmin WHERE nomeUsuario = '$nomeUsuario' AND senha = '$senha'";

        $resultado = $conexao->query($sql);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}