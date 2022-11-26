<?php
session_start();

if (!isset($_SESSION['nomeUsuario'])){
    header("Location:form_login.php");
}