<?php
include_once "fachada.php";

$nome = @$_GET["nome"];
$descricao = @$_GET["descricao"];
$fornecedor = @$_GET["fornecedor"];
$quantidade = @$_GET["quantidade"];
$preco = @$_GET["preco"];

$produto = new Produto(null, $nome, $descricao, $fornecedor, $quantidade, $preco);
$dao = $factory->getProdutoDao();
$dao->insere($produto);

header("Location: mostra_todos_produtos.php");
exit;

?>