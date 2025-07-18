<?php
    session_start(); //Inicia a sessão
    session_unset(); //Apaga os dados da sessão
    session_destroy(); //Exclui a sessão

    echo "Você saiu. <a href='exibirsessao.php'>Ir para a página exibir.</a>";

