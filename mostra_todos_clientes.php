<?php
// layout do cabeçalho

//include "verifica.php";

$page_title = "Listagem de Clientes";

include_once "layout_header.php";
include_once "fachada.php";

echo "<section>";

// procura usuários

$dao = $factory->getClienteDao();
$clientes = $dao->buscaTodos();

// display the products if there are any
if($clientes) {
 
	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
		echo "<th>Código</th>";
		echo "<th>Login</th>";
		echo "<th>Nome</th>";
	echo "</tr>";

	foreach ($clientes as $cliente) {

		echo "<tr>";
			echo "<td>{$cliente->getCodigo()}</td>";
			echo "<td>{$cliente->getLogin()}</td>";
			echo "<td>{$cliente->getNome()}</td>";
			echo "<td>";
				// botão para mostrar um cliente
				echo "<a href='mostra_cliente.php?codigo={$cliente->getCodigo()}' class='btn btn-primary left-margin'>";
					echo "<span class='glyphicon glyphicon-list'></span> Mostra";
				echo "</a>";
				// botão para alterar um cliente
				echo "<a href='modifica_cliente.php?codigo={$cliente->getCodigo()}' class='btn btn-info left-margin'>";
				echo "<span class='glyphicon glyphicon-edit'></span> Altera";
				echo "</a>";
				// botão para remover um cliente
				echo "<a href='remove_cliente.php?codigo={$cliente->getCodigo()}' class='btn btn-danger left-margin'";
				echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
				echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
				echo "</a>";
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
 
echo "<a href='cadastro_cliente.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</section>";

// layout do rodapé
include_once "layout_footer.php";
?>

