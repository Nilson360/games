<?php

session_status();
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
}

function cripto($senha){
    $c="";
    for($pos = 0; $pos<strlen($senha); $pos++){
        $letra =ord($senha[$pos]) +1;
        $c .= chr($letra);
    }
    return $c;
}
function gerarHash($senha){
    //$txt =cripto($senha);
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}
function testarHash($senha, $hash){
    $ok=password_verify($senha,$hash);
    return $ok;
}

//echo cripto("teste") ."<br>";
//echo gerarHash("admin") ."<br>";
//echo testarHash("admin", '$2y$10$j/Mi.yBDMkelbDjdQwCwpuGTQPiQn3Er9BTPZpSL.ajWw77jKdIoi');