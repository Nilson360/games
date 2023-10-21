<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php
    require_once "includes/dbb.php";
    require_once "includes/functions.php";
?>
<div id="body">

    <?php
        $cod= $_GET['cod']?? 0;
        $busca= $banco->query("select * from jogos where cod=$cod");
    ?>
    <h1>Detalhes do jogo</h1>
    <table class='detalhes'>
        <?php

            if(!$busca){
                echo "Houve um erro. $banco->error";
            } else{
                if($busca->num_rows == 1){
                    $reg = $busca->fetch_object();
                    $capa=thumb($reg->capa);
                    echo"<tr><td rowspan='3'><img src='$capa' class='full'></td></tr>";
                    echo "<tr<td><h2>$reg->nome</h2></td></tr>";
                    echo "Nota : " . number_format($reg->nota,1) ."/10";
                    echo "<tr><td>$reg->descricao</td></tr>";
                    echo "<tr><td>Adm</td></tr>";
                } else {
                    echo "Sem dados de momento, volte mais tarde!";
                }
            }
        ?>
    </table>
    <a href="index.php"><img src="assets/icones/icoback.png"></a>
</div>
<?php include_once "rodape.php"?>
</body>
</html>