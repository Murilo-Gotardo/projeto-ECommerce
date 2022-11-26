<?php
include "topo.php";
require_once "src/UsuarioAdminDAO.php";

$senha = $_POST['senha'];
$senhaConfirma = $_POST['senha2'];
$nomeUsuario = $_POST['nomeUsuario'];

$UsuarioDAO = new UsuarioAdminDAO();

if ($senha == $senhaConfirma) {

    $senhaCripto = md5($senha);
    $nomeUsuario = $UsuarioDAO->consultarUsuario($nomeUsuario, $senha);

    $UsuarioDAO->cadastrarUsuario($_POST);
    echo "<h3>Usuario cadastrado com sucesso!</h3>";
} else {
    header("Location:form_cadastro_usuario_admin.php?nomeUsuario=$nomeUsuario&msg=senhas nao sao as mesmas");
}

include "rodape.php";
