<?php
include_once "fachada.php";

$nome = @$_GET["nome"];
$login = @$_GET["login"];
$senha = @$_GET["senha"];
$rua = @$_GET["rua"];
$numero = @$_GET["numero"];
$complemento = @$_GET["complemento"];
$bairro = @$_GET["bairro"];
$cep = @$_GET["cep"];
$cidade = @$_GET["cidade"];
$estado = @$_GET["estado"];
$telefone = @$_GET["telefone"];
$email = @$_GET["email"];
$cartaoCredito = @$_GET["cartaoCredito"];

$cliente = new Cliente(null, $nome, $login, $senha, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email, $cartaoCredito);
$dao = $factory->getClienteDao();
$dao->insere($cliente);

header("Location: mostra_todos_clientes.php");
exit;

?>