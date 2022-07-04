<?php
  include_once("layout_header.php");
  if (isset($_SESSION["id_usuario"])) {
    $_SESSION["carrinho"] = $_SESSION["carrinho"] . $_GET['codigo'] . ";";
    //$_SESSION["produto"] = $_GET['quantidade'];
  }
  header("Location: index.php");
?>