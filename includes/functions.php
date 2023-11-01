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

function voltar(){
    $voltar = "<a href='index.php'><span class='material-symbols-outlined'>arrow_back_ios</span></a>";
    return $voltar;

}

function msg_suceeso($m){
    $resp = "<div class='sucesso'>
        <span class='material-symbols-outlined'>check_circle</span>
        $m
</div>";
    return $resp;
}
function msg_aviso($m){
    $resp = "<div class='aviso'>
        <span class='material-symbols-outlined'>info</span>
        $m
</div>";
    return $resp;
}
function msg_erro($m){
    $resp = "<div class='erro'>
        <span class='material-symbols-outlined'>error</span>
        $m
</div>";
    return $resp;
}

