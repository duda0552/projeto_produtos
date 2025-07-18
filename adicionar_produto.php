<html>
<head>
    <title>Inventário de Produtos</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">

</head>
<body>
    <div>
        <div style="padding: 10px 10px">
            <h2 style="margin-left: 35%; margin-bottom: 50px;">Adicionar Produto</h2>
            <form style="margin-left: 70px" class="form-label mt-4" action="index.php?p=inserir" method="POST"> <!-- Abertura do formulário, action = para onde os dados vão e method pode ser POST (aparece na url) ou POST (é enviado de forma oculta) -->
                Nome: <input style="margin-left: 45px; width:900px;" type="text" name="nome" class="form-label" required><br><br> <!-- campo para entrada dos dados. Required = Obrigatório -->
                Preço: <input style="margin-left: 45px; width:900px; "type="number" step="0.01" name="preco" class="form-label" required><br><br> <!-- name é o valor que aparecerá na url quando for GET -->
                Quantidade: <input style="margin-left: 5px; width:900px;" type= "number" name="quantidade" class="form-label" required><br><br>
                Categoria: <input style="margin-left: 18px; width:900px;"  type="text" name="categoria" class="form-label" required><br><br>
            <input style="margin-left: 41%" class="btn btn-dark" type="submit" value="Cadastrar"> <!-- botão para enviar -->
        </form>
        </div>
    </div>
</body>
</html>

<?php
session_start();
if (isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quantidade']) && isset($_POST['categoria'])) {  //Isset serve para validar a variável antes de rodar a condição e evitar erro 
    $nome = $_POST['nome']; //atribuindo a uma variável o valor armazenado no metodo POST/POST
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

include 'Banco/conexao.php'; //Inclui neste arquivo um outro código, no caso o de conexão do banco
 
$sql = "INSERT INTO produtos (nome, preco, quantidade, categoria) VALUES ('$nome','$preco','$quantidade','$categoria')"; //Query para inserir dados no banco

if ($conn->query($sql) === TRUE) { //Condição que checa se a conexão foi bem-sucessida ou falhou
    //echo "Produto cadastrado com sucesso!"; //Mensagem impressa caso a conexão tenha dado certo
} else {
    echo "Erro"; //Mensagem impressa caso a conexão tenha falhado
}
}

?>