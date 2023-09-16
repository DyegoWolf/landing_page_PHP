<?php

    // Importa conexão com o banco de dados no arquivo conexao.php
    include("conexao.php");

    // Importa função de formatação de um número de telefone
    include("validacao.php");

    // Variáveis para armazenar os valores de cada input do formulário de contato
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $message = $_POST['message'];
    $erro = 0;

    /*  Expressão regular para validar o e-mail. 
        Primeiramente, verifica se o nome do utilizador possui apenas os caracteres de a-z e números de 0-9.
        Em seguida, verifica-se a presença do caractere @ para separar nome do utilizador do nome do domínio.
        O nome do domínio passa pelo mesmo processo de validação do nome do utilizador, isto é, caracteres de a-z e números de 0-9.
        Por fim, verifica-se se após o ponto contém somente caracteres de a-z (.com, .br. .gov etc).
        
        Importante frisar que no html temos um atributo para definir o tipo do dado como e-mail, que também realiza essa validação, de maneira mais prática.
        Para tornar válida a verificação via regex, é necessário alterar o atributo type para text na linha 48 do arquivo landing-page.html */
    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)){
        echo "E-mail inválido ";
        $erro = 1;
    }

    // Valida tamanho da mensagem
    if(strlen($message) < 10){
        echo "Mensagem menor do que 10 caracteres ";
        $erro = 1;
    }

    if(strlen($telephone) > 11){
        echo "Número de dígitos excede o tamanho de um telefone válido ";
        $erro = 1;
    }
    else{
        $telephone = formataTelefone($telephone);
    }

    /* Se não ocorreu nenhum erro, chama a instrução sql para inserção dos dados */
    if($erro == 0){
        // Instrução SQL para inserção dos dados do formulário no banco de dados (consultar banco no phpmyadmin)
        $sql = "INSERT INTO contacts(id, name, email, telephone, message) VALUES (NULL, '$name', '$email', '$telephone', '$message')";

        // Verifica se a inserção no banco de dados ocorreu com sucesso
        if(mysqli_query($mysqli, $sql)){
            echo "Mensagem enviada com sucesso ";
        }
        else {
            echo "Erro".mysqli_connect_error(); // Se não ocorreu com sucesso, retorna mensagem de erro e concatena com o número do erro
        }
    }
?>
