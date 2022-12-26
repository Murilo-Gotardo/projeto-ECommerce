<?php
class ConexaoBD{

    public static function getConexao():PDO{
        $conexao = new PDO("mysql:host=projeto-ecommerce-mysql-1;dbname=lisbuy","root","1234");

        return $conexao;
    }
}