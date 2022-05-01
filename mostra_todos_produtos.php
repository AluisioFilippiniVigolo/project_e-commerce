<?php
// layout do cabeçalho

include "verifica.php";

$page_title = "Listagem de Produtos";

include_once "layout_header.php";
include_once "fachada.php";

echo "<section>";

// procura usuários

$dao = $factory->getProdutoDao();
$produtos = $dao->buscaTodos();

// display the products if there are any
if($produtos) {
 
	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
		echo "<th>Código</th>";
		echo "<th>Nome</th>";
		echo "<th>Descrição</th>";
	echo "</tr>";

	foreach ($produtos as $produto) {

		echo "<tr>";
			echo "<td>{$produto->getCodigo()}</td>";
			echo "<td>{$produto->getNome()}</td>";
			echo "<td>{$produto->getDescricao()}</td>";
			echo "<td>";
				// botão para mostrar um cliente
				echo "<a href='mostra_produto.php?id={$produto->getCodigo()}' class='btn btn-primary left-margin'>";
					echo "<span class='glyphicon glyphicon-list'></span> Mostra";
				echo "</a>";
				// botão para alterar um cliente
				echo "<a href='modifica_produto.php?id={$produto->getCodigo()}' class='btn btn-info left-margin'>";
				echo "<span class='glyphicon glyphicon-edit'></span> Altera";
				echo "</a>";
				// botão para remover um cliente
				echo "<a href='remove_produtor.php?id={$produto->getCodigo()}' class='btn btn-danger left-margin'";
				echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
				echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
				echo "</a>";
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
 
echo "<a href='novo_usuario.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</section>";

// layout do rodapé
include_once "layout_footer.php";
?>

