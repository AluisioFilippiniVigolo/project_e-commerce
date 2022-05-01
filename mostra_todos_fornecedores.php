<?php
// layout do cabeçalho

include "verifica.php";

$page_title = "Listagem de Fornecedores";

include_once "layout_header.php";
include_once "fachada.php";

echo "<section>";

// procura usuários

$dao = $factory->getFornecedorDao();
$fornecedores = $dao->buscaTodos();

// display the products if there are any
if($fornecedores) {
 
	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
		echo "<th>Código</th>";
		echo "<th>Nome</th>";
		echo "<th>Descrição</th>";
	echo "</tr>";

	foreach ($fornecedores as $fornecedor) {

		echo "<tr>";
			echo "<td>{$fornecedor->getCodigo()}</td>";
			echo "<td>{$fornecedor->getNome()}</td>";
			echo "<td>{$fornecedor->getDescricao()}</td>";
			echo "<td>";
				// botão para mostrar um cliente
				echo "<a href='mostra_fornecedor.php?id={$fornecedor->getCodigo()}' class='btn btn-primary left-margin'>";
					echo "<span class='glyphicon glyphicon-list'></span> Mostra";
				echo "</a>";
				// botão para alterar um cliente
				echo "<a href='modifica_fornecedor.php?id={$fornecedor->getCodigo()}' class='btn btn-info left-margin'>";
				echo "<span class='glyphicon glyphicon-edit'></span> Altera";
				echo "</a>";
				// botão para remover um cliente
				echo "<a href='remove_fornecedor.php?id={$fornecedor->getCodigo()}' class='btn btn-danger left-margin'";
				echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
				echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
				echo "</a>";
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
 
echo "<a href='cadastro_fornecedor.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</section>";

// layout do rodapé
include_once "layout_footer.php";
?>

