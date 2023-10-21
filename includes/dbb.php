<?php

    $banco = new mysqli("127.0.0.1", "root", "", "bd_games");

    if($banco->connect_errno){
        echo "encontrei um erro $banco->connect_error";
        die();
    }


