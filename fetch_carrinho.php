<?php

include_once "fachada.php";
include_once "comum.php";

if (is_session_started() === FALSE) {
  session_start();
}

if ($_SESSION["carrinho"] != '') {
  $output = "<h3>Meu carrinho</h3>";
  $codigos = explode(";", $_SESSION["carrinho"]);
  $output .= '
    <table class="table table-striped table-bordered" id="lista_carrinho"> 
      <tr>
        <th>Nome</th>
        <th>Descrição</th> 
        <th>Preço</th>
        <th>Excluir</th>
      </tr>
    ';
  $total_compra = 0;
  $link_codigos = '';
  foreach ($codigos as $codigo) {
    if ($codigo != '') {
      $dao = $factory->getProdutoDao();
      $produto = $dao->buscaPorCodigo($codigo);
      $total_compra += $produto->getPreco();
      $link_codigos = $link_codigos . $produto->getCodigo() . ";";
      $output .= '
      <tr>
        <td>' . $produto->getNome() . '</td>
        <td>' . $produto->getDescricao() . '</td>
        <td>' . $produto->getPreco() . '</td>
        <td>     
          <a href="remove_item_carrinho.php?codigo=' . $produto->getCodigo() . '" class="btn btn-danger">
          <span class="glyphicon glyphicon-minus"></span>
          </a>
        </td>
      </tr>
      ';
    }
  }
  $output .= 'Total do pedido: R$ ' . $total_compra . '</table>';

  $output .= "<a type='submit' id='btn_continuar_compra' href='index.php' class='btn btn-primary glyphicon glyphicon-arrow-left'> Continuar Comprando</a>";

  $output .= "<a type='submit' id='btn_pedido' href='insere_pedido.php' class='btn btn-success glyphicon glyphicon-shopping-cart'> Comprar</a>";
} else {
  $output = "<h3>Seu carrinho está vazio :(</h3>";
}
echo $output;
?>