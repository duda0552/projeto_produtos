<?php
session_start();  //Iniciando Sessão

if (isset($_SESSION['nome'])){
    echo "Olá, ".$_SESSION['nome']."! Seja bem vindo ao site! 
    <a href='logout.php'>Clique aqui para sair</a>";
}else{
    echo "Olá, visitante. <a href='login.php'>Clique aqui</a> 
    para fazer login";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inventário de Produtos</title>
    <link rel="stylesheet" href="CSS/bootstrap.css"> <!-- linka o bootstrap nesse arquivo -->
</head>
    <body>

    <!-- Cabeçalho -->
    <div style="border-radius:5px" class="container col-sm-10 p-5 border">
        <h1 class="border-bottom">Inventário</h1> <!-- Titulo do cabeçalho do site -->
        <a style="border:2px solid #ccc;"  href="index.php" style="margin-left:80%" class="btn btn-outline-dark">Produtos Inventariados</a>  <!-- Botão para listar produtos cadastrados no banco -->
        <a style=" border:2px solid #ccc; margin-left:5px" href="index.php?p=novo" class="btn btn-outline-dark">Adicionar Novo Produto</a> <!-- Botão para adicionar novo produto no banco -->
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1){echo "<a href='index.php?p=sair' class='btn btn-danger'>Sair</a>";}?> <!-- Se a session for iniciada recebe 1 -->
    </div>
    <br>
    <div class="container col-sm-10 p-5 border">
<?php
 if(isset($_SESSION['logado']) && $_SESSION['logado'] == 1){
    include 'Banco/conexao.php'; //inclusão do banco de dados que está dentro do arquivo conexão.php
    //usar session para criar id excluir e não aparecer o id na url
    if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1) {
        if (isset($_GET['p'])) {
            if ($_GET['p'] == 'novo' || $_GET['p'] == 'inserir') {//Se p=novo ou p=inserir
                include 'adicionar_produto.php'; //chama o arquivo adicionar produto
            } elseif ($_GET['p'] == 'editar' || $_GET['p'] == 'salvar') {//Se p=editar ou p=salvar
            include 'editar.php'; //chama o arquivo editar
            } elseif ($_GET['p'] == 'excluir') { //Se p=excluir
            include 'excluir.php'; //chama o arquivo excluir
            } elseif ($_GET['p'] == 'sair') {
            session_unset(); //apaga os dados armazenados na sessão
            session_destroy(); //exclui a sessão
            header('Location: index.php'); //inclui a página evitando duplicação
            exit(); // importante para interromper a execução
            } else {
            include 'list.php'; // se o parâmetro "p" tiver outro valor
        }
        } else {
        include 'list.php'; // se "p" não estiver definido chama o arquivo listar
        }   
    } else {
    include 'login.php'; //chama o arquivo login
    }
 }else{
    echo 'Sessão não iniciada, faça login! <a href = "login.php">Clique aqui para realizar login</a>';
 };
?>
    </div>

   </body>
</html>