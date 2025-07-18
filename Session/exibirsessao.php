<?php
session_start();

if (isset($_SESSION['nome'])){
    echo "Olá, ".$_SESSION['nome']."! Seja bem vindo ao site! 
    <a href='logout.php'>Clique aqui para sair</a>";
}else{
    echo "Olá, visitante. <a href='login.php'>Clique aqui</a> 
    para fazer login";
}


?>