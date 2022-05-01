<?php
include_once "fachada.php";
include "verifica.php";
$id = @$_GET["codigo"];

$dao = $factory->getFornecedorDao();
$fornecedor = $dao->buscaPorCodigo($codigo);
if($fornecedor) {
	$page_title = "Exibindo Fornecedor : " . $fornecedor->getNome();
} else {
	$page_title = "Fornecedor não encontrado!";
} 

// layout do cabeçalho
include_once "layout_header.php";
if($fornecedor) {
echo "<section>";
//dados do usuário
echo "<h1> Login : " . $fornecedor->getNome() . "</h1>";
echo "<p> Codigo : " . $fornecedor->getCodigo() . "</p>";
echo "<p> Descrição : " . $fornecedor->getDescricao() . "</p>";
// botão voltar
echo "<a href='fornecedores.php' class='btn btn-primary left-margin'>";
echo "Voltar";
echo "</a>";
echo "</section>";
}
// layout do rodapé
include_once "layout_footer.php";
?>
