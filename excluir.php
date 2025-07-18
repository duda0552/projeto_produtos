<?php
session_start();  //Iniciando Sessão
if ($_GET['p']=='excluir' && isset($_GET['id'])){ // Condição que checa se p recebeu "excluir" e se existe um ID
    $id = $_GET['id']; //variável que armazena o ID que está no GET
    $sql = "DELETE FROM produtos WHERE id = $id"; // Consulta para deletar os dados, do id indicado, no banco 

    if ($conn->query($sql) === TRUE) { // Condição que checa se o banco conectou corretamente
        echo "Produto excluído com sucesso!<br>"; //Mensagem caso a execução tenha dado certo e o produto foi excluido do banco
        echo "<a href='index.php' class='btn btn-outline-dark'>Voltar</a>";  //Botão para retornar para a página principal
    } else { 
        echo "Erro ao excluir:" . $conn->error; //Mensagem em caso de erro na conexão
    } 
}else{
    echo 'Erro ao excluir'; //Mensagem caso p não seja igual a excluir e não exista id
    echo "<a href='index.php' class='btn btn-outline-dark'>Voltar</a>"; //Botão voltar
}
?>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    echo "ID recebido: " . htmlspecialchars($id);
  }
?>