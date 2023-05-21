<?php
    // DB data
    $dbServername = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'users';

    // Try to connect
    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);


    // Check connection
    if ($conn -> connect_error) {
        die("Falha na conexão: " . $conn -> connect_error);
    }

    // echo "Conexão bem-sucedida";
?>