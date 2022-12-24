<?php
include "../incs/header.php";
require_once "../src/UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO;

$senha = $_POST['senha'];
$senhaConfirma = $_POST['confirmarSenha'];
$nomeUsuario = $_POST['nomeUsuario'];

if ($senha == $senhaConfirma) {

    $senhaCripto = md5($senha);
    $nomeUsuario = $usuarioDAO->consultarUsuario($nomeUsuario, $senha);

    $usuarioDAO->cadastrarUsuario($_POST);
    echo "<h3>Usuario cadastrado com sucesso!</h3>";
} else {
    header("Location:cadastro.php?nomeUsuario=$nomeUsuario&msg=As senhas não são as mesmas");
}

include "../incs/footer.php";