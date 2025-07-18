<?php
    session_start();  //Iniciando Sessão
    include ('banco/conexao.php');

    if(isset($_POST['enviar'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        // Faz a consulta
        $resultado = $conn->query("SELECT * FROM cadastro WHERE email = '$login'");

        // Verifica se encontrou um usuário com esse email
    if ($resultado->num_rows > 0) {
        $cadastro = $resultado->fetch_assoc();

        if ($senha == $cadastro['senha']) {
            echo 'Login e senha correspondem. Você está logado! <a href="index.php">Clique aqui para ir à página inicial!</a>';
            $_SESSION['logado'] = 1;
        } else {
            echo 'Senha incorreta, tente novamente!';
        }
    } else {
        echo 'Email não encontrado, faça seu <a href="registrar.php">cadastro</a>!';
    }
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="CSS/bootstrap.css"> <!-- linka o bootstrap nesse arquivo -->
<h2 style="width:42%; margin-top:1%; text-align:center;" >Área de Login</h2>
<form action="login.php" method="POST">
    <div style="margin-left:1%; margin-top:1%" class="mb-3 row">
        <label class="col-sm-0 col-form-label" >Login </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
    </div>
    <div style="margin-left:1%" class="mb-3 row">
        <label class="col-sm-0 col-form-label">Senha</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
    </div>
    
    <button style="margin-left:17%; margin-top:1%" type="submit" class="btn btn-primary" name="enviar">Login</button>
    <a href="index.php" style="margin-top:1%" class="btn btn-danger">Cancelar</a>
</form>
