<?php
include_once "fachada.php";

$id = @$_GET["codigo"];
$nome = @$_GET["nome"];
$login = @$_GET["login"];
$nome = @$_GET["nome"];

$usuario = new Usuario($id,$login,$senha,$nome);
$dao = $factory->getUsuarioDao();

//$usuario->setPassword(md5($usuario->getPassword()));

$dao->altera($usuario);

header("Location: usuarios.php");
exit;

?>