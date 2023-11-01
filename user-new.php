<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /></head>
<body>
<?php
require_once "includes/dbb.php";
require_once "includes/functions.php";
require_once "includes/login.php";
global$banco;
?>
<div id="body">
    <?php
    if(!is_admin()){
        echo msg_erro("Você nao é administrador");
        echo voltar();
    } else{
        if(!isset($_POST['usuario'])){
            require_once "user-new-form.php";
        }else{
            $usuario = $_POST['usuario']?? null;
            $nome = $_POST['nome'] ?? null;
            $senha1 = $_POST['senha1'] ?? null;
            $senha2 = $_POST['senha2'] ?? null;
            $tipo = $_POST['tipo'] ?? null;
            //echo "Pronto para salvar os dados!";
            //echo msg_suceeso("novo usuario cadastrado com sucesso");

            if($senha1 === $senha2){
                if(empty($usuario) || empty($tipo) || empty($nome) || empty($senha1) || empty($senha2)){
                    echo msg_erro("Por favor! Preencha todos os campos");
                }else{
                    $senha = gerarHash($senha1);
                    $q = "INSERT INTO usuarios (usuario,nome,senha,tipo) VALUES ('$usuario','$nome','$senha','$tipo')";
                    if($banco->query($q)){
                        echo msg_suceeso("usuario cadastrado com o sucesso");
                    }else{
                        echo msg_erro("nao possivel cadastrar o $usuario. É possivel que ele exista");
                    }
                }
            } else {
                echo msg_erro("As senhas sao diferentes");
            }
        }

    }
    echo "<br>". voltar();
    ?>
</div>
</body>
</html>