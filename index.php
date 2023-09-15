<?php

    // Importa conexão com o banco de dados no arquivo conexao.php
    include("conexao.php");

    // Variáveis para armazenar os valores de cada input do formulário de contato
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $message = $_POST['message'];

    // Instrução SQL para inserção dos dados do formulário no banco de dados (consultar banco no phpmyadmin)
    $sql = "INSERT INTO contacts(id, name, email, telephone, message) VALUES (NULL, '$name', '$email', '$telephone', '$message')";

    // Verifica se a inseração no banco de dados ocorreu com sucesso
    if(mysqli_query($mysqli, $sql)){
        echo 'Mensagem enviada com sucesso';
    }
    else {
        echo "Erro".mysqli_connect_error();
    }

?>
