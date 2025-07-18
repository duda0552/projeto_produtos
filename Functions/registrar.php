<!DOCTYPE html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">

</head>
<body>
    <div>
        <div style="padding: 10px 10px">
            <h2 style="margin-left: 20%; margin-bottom: 50px;">Cadastro de Novo Usuário</h2>
            <form style="margin-left: 70px" class="form-label mt-4" action="registrar.php" method="POST"> <!-- Abertura do formulário, action = para onde os dados vão e method pode ser POST (aparece na url) ou POST (é enviado de forma oculta) -->
                Nome: <input style="margin-left: 21px; width:900px;" type="text" name="nome" class="form-label" required><br><br> <!-- campo para entrada dos dados. Required = Obrigatório -->
                Email: <input style="margin-left: 26px; width:900px; "type="email" step="0.01" name="email" class="form-label" required><br><br> <!-- name é o valor que aparecerá na url quando for GET -->
                Telefone: <input style="margin-left: 5px; width:900px;" type= "phone" name="telefone" class="form-label" required><br><br>
                Senha: <input style="margin-left: 22px; width:900px;"  type="password" name="senha" class="form-label" required><br><br>
            <input style="margin-left: 26%" class="btn btn-dark" type="submit" value="Cadastrar"> <!-- botão para enviar -->
        </form>
        </div>
    </div>
</body>

<?php
  if(ISSET($_POST['nome']) && ISSET($_POST['email']) && ISSET($_POST['telefone']) && ISSET($_POST['senha'])){
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $telefone = $_POST['telefone'];
   $senha = $_POST['senha'];

   include ('banco/conexao.php');
   $sql = "INSERT INTO cadastro (nome, email, telefone, senha) VALUES ('$nome','$email','$telefone','$senha')";
   
   if ($conn->query($sql) == TRUE) { //Condição que checa se a conexão foi bem-sucessida ou falhou
    echo "Cadastrado realizado com sucesso! <a href='login.php'> Clique aqui para fazer login</a>"; //Mensagem impressa caso a conexão tenha dado certo
    } else {
    echo "Erro de conexão"; //Mensagem impressa caso a conexão tenha falhado
    }
  }
?>