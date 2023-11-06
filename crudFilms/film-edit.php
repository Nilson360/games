<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /></head>
<body>
<?php
require_once "../includes/dbb.php";
require_once "../includes/functions.php";
require_once "../includes/login.php";

?>
<div id="body">
    <h1>Editar um jogo </h1>
    <?php
        require_once "film-edit-form.php";
        echo voltar();
    ?>

</div>
</body>
</html>