<?php
  include_once("layout_header.php");
  if (isset($_SESSION["id_usuario"])) {
    $codigos = explode(";", $_SESSION["carrinho"]);
    $codigo_remover = $_GET['codigo'];
    $novo_carrinho = '';
    foreach ($codigos as $codigo) {
      if($codigo != '') {
        if (strcasecmp($codigo, $codigo_remover) != 0) {
          $novo_carrinho = $novo_carrinho . $codigo . ";"; 
        }
      }
    }
    $_SESSION["carrinho"] = $novo_carrinho;
    header("Location: carrinho.php");
  }
?>