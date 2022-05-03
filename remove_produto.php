<?php
include_once "fachada.php";

$codigo = @$_GET["codigo"];

$produto = new Produto(null, $nome, $descricao, $fornecedor, $quantidade, $preco);
$dao = $factory->getProdutoDao();
$dao->removePorCodigo($codigo);

header("Location: mostra_todos_produtos.php");
exit;

?>