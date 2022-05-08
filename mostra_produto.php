<?php
include_once "fachada.php";
include "verifica.php";
$codigo = @$_GET["codigo"];

$dao = $factory->getProdutoDao();
$produto = $dao->buscaPorCodigo($codigo);
if($produto) {
	$page_title = "Exibindo Produto : " . $produto->getNome();
} else {
	$page_title = "Produto não encontrado!";
} 

// layout do cabeçalho
include_once "layout_header.php";
if($produto) {
echo "<section>";
//dados do usuário
echo "<h1> Login : " . $produto->getNome() . "</h1>";
echo "<p> Codigo : " . $produto->getCodigo() . "</p>";
echo "<p> Descrição : " . $produto->getDescricao() . "</p>";
// botão voltar
echo "<a href='mostra_todos_produtos.php' class='btn btn-primary left-margin'>";
echo "Voltar";
echo "</a>";
echo "</section>";
}
// layout do rodapé
include_once "layout_footer.php";
?>
