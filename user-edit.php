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
?>
<div id="body">
    <?php
    if(!is_logado()){
        echo msg_erro("Effectue <a href='user-login.php'>login</a> para  editar os seus dados");
    } else{
        if(!isset($_POST['usuario'])){
            include "user-edit-form.php";
        } else{
           $usuario = $_POST['usuario'] ?? null;
           $nome = $_POST['nome'] ?? null;
           $tipo = $_POST['tipo'] ?? null;
           $senha1 = $_POST['senha1'] ?? null;
           $senha2 = $_POST['senha2'] ?? null;
           $q = "UPDATE usuarios set usuario ='$usuario', nome ='$nome'";
           if(empty($senha1) || is_null($senha1)){
               echo msg_aviso('Senha antiga vazia');
           } else{
               if($senha1 === $senha2){
                   $senha = gerarHash($senha1);
                   $q .= ", senha= '$senha'";
               } else{
                   echo msg_aviso('Senhas nao conferem.As senhas anteriores serao mantidas');
               }
           }
           $q .= " where usuario ='". $_SESSION['user']."' ";
          if($banco->query($q)){
              echo msg_suceeso('Dados actualizados com sucesso!');
              logout();
              msg_aviso('Por segurança, efectue o <a href="user-login.php">login</a> novamente!');
          }else{
              msg_erro('Erro, nao foi possivel actualizar');
          }
        }
    }
    echo voltar();
    ?>
</div>

</body>
</html>