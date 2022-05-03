<?php
include_once "fachada.php";

$codigo = @$_GET["codigo"];

//$cliente = new Cliente(null, $nome, $login, $senha, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email, $cartaoCredito);
$dao = $factory->getClienteDao();
$dao->removePorCodigo($codigo);

header("Location: mostra_todos_clientes.php");
exit;

?>