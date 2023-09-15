<?php
    // Dados da conexão com o banco de dados
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'dados';

    // Realiza conexão com o banco de dados
    $mysqli = mysqli_connect($server, $user, $password, $dbname);

    // Se a conexão apresentar algum erro, irá retornar o número desse erro e validar a condição
    if($mysqli->connect_errno){
        die("Cannot conect to the database".mysqli_connect_errno()); // Uma vez válida a condição, retorna a string e concatena com o número do erro
    }
?>