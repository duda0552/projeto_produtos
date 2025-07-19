<?php 
    
    $host = "localhost"; //atribuindo o local a variável host
    $usuario = "root"; //atribuindo o nome de usuário a variável usuário
    $senha = ""; //atribuindo a senha a variável senha
    $banco = "produtos"; //atribuindo o nome do banco a variável banco
    
    // Criar conexão 
    $conn = new mysqli($host, $usuario, $senha, $banco); // criada conexão utilizando a função mysqli e a variável conn armazena o resultado da conexão (falhou ou não)
    
    // Verificar conexão 
    if ($conn->connect_error) { //se o valor armazenado na variavel $conn for que a conexão falhou
        die("Conexão falhou: " . $conn->connect_error); //Retorna a mensagem de falha
    } 
    
    //echo "Conectado com sucesso!"; //retorna na tela a mensagem que está dentro dos parenteses
?> 