<?php

    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'formulario';

    $conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);
    
    if ($conexao->connect_errno) {
        die("Falha na conexão: " . $conexao->connect_error);
    } 
    else {
        echo "Conexão efetuada!";
    }

?>
