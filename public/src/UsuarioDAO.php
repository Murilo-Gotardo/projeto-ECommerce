<?php
require_once "ConexaoBD.php";
require_once "Funcoes.php";

class UsuarioDAO {

    function cadastrarUsuario($dados){
        $conexao = ConexaoBD::getConexao();

        $imagem = pegarImagem($_FILES);

        $senha = md5($dados['senha']);

        $sql = "INSERT INTO usuario (imagem, nomeUsuario, dataNascimento, senha, email, cpf) VALUES ('$imagem', '{$dados['nomeUsuario']}', '{$dados['dataNascimento']}', '$senha', '{$dados['email']}', '{$dados['cpf']}')";

        $conexao->exec($sql);
    }

    function consultarUsuario($email) {
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT * FROM usuario WHERE email = '$email'";

        $resultado = $conexao->query($sql);
        
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}