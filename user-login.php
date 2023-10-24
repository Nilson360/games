<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        div#body{
            width: 270px;
            font-size: 15px;
        }
        table td{
            padding: 10px;
        }
    </style>
</head>
<body>
<?php
require_once "includes/dbb.php";
require_once "includes/functions.php";
require_once "includes/login.php";
?>
<div id="body">
    <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;
        if(is_null($u) || is_null($s)){
            require "user-login-form.php";
        } else{
           $q = "select usuario, nome, senha, tipo from usuarios where usuario = '$u' LIMIT 1";
           $busca = $banco->query($q);
           if(!$busca){
               echo msg_erro("falha em acessar o banco!");
           } else{
               if($busca->num_rows > 0){
                   $reg = $busca->fetch_object();
                   if(testarHash($s,$reg->senha)){
                       echo msg_suceeso("logado com sucesso");
                       $_SESSION['user'] = $reg->usuario;
                       $_SESSION['nome'] = $reg->nome;
                       $_SESSION['tipo'] = $reg->tipo;
                   } else{
                       echo msg_erro("senha invalida");
                   }
               } else{
                   msg_erro("Usuario nao existe");
               }

           }
        }
    echo voltar();
    ?>
</div>

</body>
</html>