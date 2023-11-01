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
        global $banco;
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
                    if(is_admin()){

                        echo " <span class='material-symbols-outlined'> add_circle</span>";
                        echo" <span class='material-symbols-outlined'>edit</span>";
                        echo " <span class='material-symbols-outlined'> delete</span>";

                    }elseif(is_editor()){

                        echo" <span class='material-symbols-outlined'>edit</span>";

                    }
                    echo "<tr><td>$reg->descricao</td></tr>";
                    echo "<tr><td>Adm</td></tr>";
                } else {
                    echo "Sem dados de momento, volte mais tarde!";
                }
            }
        ?>
    </table>
    <?php echo voltar(); ?>
</div>

<?php include_once "rodape.php"?>
</body>
</html>