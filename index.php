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
    require_once "includes/functions.php";
?>
    <div id="body">
        <?php
            require_once "topo.php";
        ?>
        <p>Escolha o seu jogo</p>
        <form method="get" id="busca" action="index.php">
            Ordenar : Nome | Produtora | Nota Alta | Nota Baixa|
            Buscar: <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="ok">
        </form>
        <table class="listagem">
            <?php
            $q = "select j.cod, j.nome,g.genero,p.produtora, j.capa from jogos j join generos g on j.genero = g.cod 
                    join produtoras p on j.produtora = p.cod
                    ";
            $busca = $banco->query($q);
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado.</td><tr/>";
            } else{
                if($busca->num_rows == 0){
                    echo "<tr><td>Nenhum dado encontrado.</td><tr/>";
                } else{
                    while($reg=$busca->fetch_object()){
                        $capa = thumb($reg->capa);
                        echo "<tr><td><img src='$capa' class='mini'></td>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                        echo " [$reg->genero]";
                        echo "<br> $reg->produtora";
                        echo "<td>Adm</td>";
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php include_once "rodape.php"?>
</body>
</html>