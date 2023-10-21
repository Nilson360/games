<?php
function thumb($arq){
    $caminho = "assets/fotos/$arq";
    if(is_null($arq) || !file_exists($caminho)){
        $indispo = "assets/fotos/indisponivel.png";
        return $indispo;
    }else {
        return $caminho;
    }
}