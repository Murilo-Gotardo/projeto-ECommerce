<?php

function pegarImagem(Array $files):string{
    $nome_img = $files['imagem']['name'];
    $tipo_img = $files['imagem']['type'];
    $tam_img = $files['imagem']['size'];
    $imagem = $files['imagem']['tmp_name'];

    $fp = fopen($imagem, "rb");
    $imagem = fread($fp, $tam_img);
    $imagem = addslashes($imagem);
    fclose($fp);

    return $imagem;
}