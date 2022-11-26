<?php
session_start();
require_once "src/UsuarioAdminDAO.php";

$senha = md5($_POST['senha']);
$nomeUsuario = $_POST['nomeUsuario'];

$usuarioDAO = new UsuarioAdminDAO();
$usuarioBD = $usuarioDAO->consultarUsuario($nomeUsuario, $senha);

if ($senha == $usuarioBD['senha'] && $nomeUsuario == $usuarioBD['nomeUsuario']) {
    $_SESSION['nomeUsuario'] = $usuarioBD['nomeUsuario'];
    header("Location:index.php");
} else {
    header("Location:form_login.php?nomeUsuario=$nomeUsuario&msg=Senha ou usuario incorretos");
}