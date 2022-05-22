<?php
include_once "fachada.php";

$codigo = @$_GET["codigo"];
$nome = @$_GET["nome"];
$descricao = @$_GET["descricao"];
$rua = @$_GET["rua"];
$numero = @$_GET["numero"];
$complemento = @$_GET["complemento"];
$bairro = @$_GET["bairro"];
$cep = @$_GET["cep"];
$cidade = @$_GET["cidade"];
$estado = @$_GET["estado"];
$telefone = @$_GET["telefone"];
$email = @$_GET["email"];

$fornecedor = new Fornecedor($codigo, $nome, $descricao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email);
$dao = $factory->getFornecedorDao();
$dao->altera($fornecedor);

header("Location: mostra_todos_fornecedores.php");
exit;

?>