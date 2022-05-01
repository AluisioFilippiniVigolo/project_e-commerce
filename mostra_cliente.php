<?php
include_once "fachada.php";
include "verifica.php";
$id = @$_GET["id"];

$dao = $factory->getClienteDao();
$cliente = $dao->buscaPorCodigo($codigo);
if($cliente) {
	$page_title = "Exibindo Cliente : " . $cliente->getNome();
} else {
	$page_title = "Usuário não encontrado!";
} 

// layout do cabeçalho
include_once "layout_header.php";
if($cliente) {
echo "<section>";
//dados do usuário
echo "<h1> Login : " . $cliente->getLogin() . "</h1>";
echo "<p> Id : " . $cliente->getCodigo() . "</p>";
echo "<p> Nome : " . $cliente->getNome() . "</p>";
// botão voltar
echo "<a href='cliente.php' class='btn btn-primary left-margin'>";
echo "Voltar";
echo "</a>";
echo "</section>";
}
// layout do rodapé
include_once "layout_footer.php";
?>
