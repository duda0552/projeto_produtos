<?php
// Iniciar a sessão
session_start();
$_SESSION["nome"] = "Eduarda";
echo "As configurações foram redefinidas. <br>";
echo "<a href='exibirsessao.php'>Ir para a página exibir</a>";

?>
