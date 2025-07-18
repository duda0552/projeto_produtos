<!-- Exibe Lista de Produtos Salvos -->
<table class="table"> <!-- cria uma tabela-->
    <thead> <!-- cria uma coluna com o nome que foi definido entre a abertura e fechamento da tag-->
        <tr> <!-- cria uma linha-->
            <th scope="col">#</th> <!-- cria uma coluna com o nome que foi definido entre a abertura e fechamento da tag-->
            <th scope="col">Nome</th> <!-- cria uma coluna com o nome que foi definido entre a abertura e fechamento da tag-->
            <th scope="col">Preço</th> <!-- cria uma coluna com o nome que foi definido entre a abertura e fechamento da tag-->
            <th scope="col">Quantidade</th> <!-- cria uma coluna com o nome que foi definido entre a abertura e fechamento da tag-->
            <th scope="col">Categoria</th> <!-- cria uma coluna com o nome que foi definido entre a abertura e fechamento da tag-->
        </tr>
    </thead>
    <tbody>  <!-- cria um corpo para o html-->

        <?php
        include 'Banco/conexao.php'; // ou 'db.php' se for esse o nome
        $resultado = $conn->query("SELECT * FROM produtos");  //variável que armazena a conexão e busca todos os dados da tabela indicada
        $numero =1;

        while ($linha = $resultado->fetch_assoc()) { //Enquanto houver linhas na tabela produtos a condição deve ser repetida | fetch_assoc() atribui o total de linhas da tabela
            
        //print_r ($linha); --Esse codigo serve para ver como o array está armazenando os dados quando o while é executado
            echo '<tr>';
                echo '<th scope="row">'.$numero.'</th>'; //imprime o id
                echo '<td>'.$linha['nome'].'</td>'; //imprime o nome
                echo '<td>'.$linha['preco'].'</td>'; //imprime o telefone
                echo '<td>'.$linha['quantidade'].'</td>'; //imprime o email
                echo '<td>'.$linha['categoria'].'</td>'; //imprime a data de nascimento
                echo '<td>';
                echo '<div class="d-grid gap-2 d-md-flex justify-content-md-end">';
                echo '<a href="index.php?p=editar&id='.$linha['id'].'" class="btn btn-outline-info">Editar</a>'; //imprime o botão de editar
                echo '<a href="index.php?p=excluir&id='.$linha['id'].'" class="btn btn-outline-danger">Excluir</a>'; //imprime o botão de excluir
                echo '</div>';
                echo '</td>';
            echo '</tr>';
        $numero++;
        }

        ?>

        </tbody>
    </table>