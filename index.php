<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>

<?php
    require_once "includes/dbb.php";
    require_once "includes/functions.php";
    require_once "includes/login.php";
    $ordem = $_GET['o'] ?? "n";
    $chave = $_GET['c'] ?? "";
?>
    <div id="body">
        <?php
            require_once "topo.php";
        ?>
        <p>Escolha o seu jogo</p>
        <form method="get" id="busca" action="index.php">
            Ordenar :
            <a href="index.php?o=n&c=<?php echo $chave; ?>">Nome</a>|
            <a href="index.php?o=p&c=<?php echo $chave; ?>">Produtora </a>|
            <a href="index.php?o=n1&c=<?php echo $chave; ?>">Nota Alta</a> |
            <a href="index.php?o=n2&c=<?php echo $chave; ?>"> Nota Baixa</a>|
            <a href="index.php"> Mostrar todos</a>|
            Buscar: <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="ok">
        </form>
        <table class="listagem">
            <?php
            $q = "select j.cod, j.nome,g.genero,p.produtora, j.capa from jogos j join generos g on j.genero = g.cod 
                    join produtoras p on j.produtora = p.cod ";

            if(!empty($chave)){
                $q .= "WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%' ";
            }
            switch($ordem){
                case "p":
                    $q .= "ORDER BY p.produtora";
                    break;
                case "n1":
                    $q .= "ORDER BY j.nota DESC";
                    break;
                case "n2":
                    $q .= "ORDER BY j.nota ASC";
                    break;
                default:
                    $q .= "ORDER BY  j.nome";
            }
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