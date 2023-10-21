<?php
    include_once "includes/dbb.php";
        echo "<footer>";
        echo "<p>Acessado por " . $_SERVER['REMOTE_ADDR'] . " em " . date('d/m/Y') ."</p>";
        echo "<p>Desenvolvido por Nilson &copy; " .date("Y") ."</p>";
        echo "</footer>";
    $banco->close();