<?php
  session_start();  //Iniciando Sessão  
    if ($_GET['p']=='salvar' && isset($_GET['id'])){
        // Receber os dados do formulário 
        $id = $_GET['id']; 
        $nome = $_POST['nome']; 
        $preco = $_POST['preco']; 
        $quantidade = $_POST['quantidade']; 
        $categoria = $_POST['categoria']; 
        
        // Inserir no banco 
        $sql = "UPDATE produtos SET nome='$nome', preco='$preco', quantidade= '$quantidade', categoria='$categoria' WHERE id = $id"; //numeros não possuem aspas
        if ($conn->query($sql) === TRUE) { // Condição que checa se o banco conectou corretamente
        echo "Produto atualizado com sucesso!<br>"; //Mensagem caso a execução tenha dado certo e o produto foi excluido do banco
        echo "<a href='index.php' class='btn btn-outline-dark'>Voltar</a>";  //Botão para retornar para a página principal
        } else { 
        echo "Erro ao atualizar:" . $conn->error; //Mensagem em caso de erro na conexão
         } 
    } 
    
    if ($_GET['p']=='editar' && isset($_GET['id'])){
        $id = $_GET['id']; //variavel recebe o id armazenado no get
        $resultado = $conn->query("SELECT * FROM produtos WHERE id=$id"); //faz uma busca no banco
        $produto = $resultado->fetch_assoc(); //passa para a variavel a linha que foi buscada
        
    ?>

    <!-- Edita Produto -->
    <h2 style="margin-bottom: 5%;">Editar Produto</h2>
    <form action="index.php?p=salvar&id=<?php echo $produto['id'];?>" method="POST"> <!-- formulário com função de postar de forma oculta os dados na linha do id selecionado -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $produto['nome']; ?>"> <!--  retorna o valor que contem na coluna nome  -->
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Preço</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo $produto['preco']; ?>"> <!--  retorna o valor que contem na coluna preco -->
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Telefone</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $produto['quantidade']; ?>"> <!--  retorna o valor que contem na coluna quantidade  -->
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $produto['categoria']; ?>"> <!--  retorna o valor que contem na coluna categoria  -->
            </div>
        </div>
        <div class="mb-3 row">
        </div>
        <button style="margin-right:1%" type="submit" class="btn btn-outline-success">Salvar</button>
        <a href="index.php" class="btn btn-outline-danger">Cancelar</a>
    </form>
    
    <?php
    }

    ?>