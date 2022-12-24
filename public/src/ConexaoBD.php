<?php
class ConexaoBD{

    public static function getConexao():PDO{
        $conexao = new PDO("mysql:host=localhost;port=8002;dbname=lisbuy","root","1234");
        return $conexao;
    }
}