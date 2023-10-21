<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>

<?php
    require_once "includes/dbb.php";
    require_once "includes/functions.php"
?>
    <div id="body">
        <p>Escolha o seu jogo</p>
        <table class="listagem">
            <?php

            $busca = $banco->query("select * from jogos order by nome");
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado.</td><tr/>";
            } else{
                if($busca->num_rows == 0){
                    echo "<tr><td>Nenhum dado encontrado.</td><tr/>";
                } else{
                    while($reg=$busca->fetch_object()){
                        $capa = thumb($reg->capa);
                        echo "<tr>
                                <td><img src='$capa' class='mini'></td>
                                <td>$reg->nome</td>
                                <td>Adm</td>
                                </tr>";
                    }
                }
            }
            ?>
        </table>
    </div>
</body>
<?php $banco->close(); ?>
</html>