<?php
    echo "<header>";
        if(empty($_SESSION['user'])){
            echo "<a href='user-login.php'>Entrar</a>";
        } else {
            echo "Ola, " . $_SESSION['nome'] ." | ";
            echo "<a href='user-edit.php'>Meus dados |</a> ";
            if(is_admin()){
                echo "<a href='user-new.php'>Novo usuario |</a> ";
                echo "<a href='#'>Novo jogo |</a> ";
            }
            echo "<a href='user-logout.php'>Sair</a>";
        }
    echo "</header>";