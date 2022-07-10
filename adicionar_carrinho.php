<?php
include_once "comum.php";

if (is_session_started() === FALSE) {
  session_start();
}

if (isset($_SESSION['nome_usuario'])) {
  $_SESSION['carrinho'] = $_SESSION['carrinho'] . $_GET['codigo'] . ";";
}

header("Location: carrinho.php");
exit;

?>