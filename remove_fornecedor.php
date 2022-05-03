<?php
include_once "fachada.php";

$codigo = @$_GET["codigo"];

//$fornecedor = new Fornecedor(null, $nome, $descricao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email);
$dao = $factory->getFornecedorDao();
$dao->removePorCodigo($codigo);

header("Location: mostra_todos_fornecedores.php");
exit;

?>