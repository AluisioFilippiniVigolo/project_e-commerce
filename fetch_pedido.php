<?php

include_once "fachada.php";
include_once "comum.php";

if (is_session_started() === FALSE) {
  session_start();
}

$daoPedido = $factory->getPedidoDao();
$daoItemPedido = $factory->getItemPedidoDao();
$daoProduto = $factory->getProdutoDao();

$pedidos = $daoPedido->buscaPorCliente($_SESSION["id_usuario"]);

$output = "<h3>Meus pedidos</h3>";

foreach($pedidos as $pedido) {
  $output .= '
    <h4>Pedido: ' . $pedido->getNumero() . '</h4>';

  $output .= '
    <h4 class="dados_pedido">Situação: ' . $pedido->getSituacao() . '</h4>';

  $output .= ' 
    <a class="btn btn-danger btn_cancelar_pedido" href="cancelar_pedido.php?codigo=' . $pedido->getNumero() . '">
    <span class="glyphicon glyphicon-remove"> Cancelar Pedido</span>
    </a>';

  $output .= '
  <table class="table table-striped table-bordered" id="lista_pedidos"> 
    <tr>
      <th class="tabela_produto">Produto</th>
      <th class="tabela_quantidade">Quantidade</th> 
      <th class="tabela_preco">Preço</th>
      <th class="tabela_imagem">Imagem</th>
      <th class="tabela_estoque">Estoque Atual</th>
    </tr>
  ';

  $itensPedido = $daoItemPedido->buscaTodosPorNumeroPedido($pedido->getNumero());

  foreach($itensPedido as $itemPedido) {

    $produto = $daoProduto->buscaPorCodigo($itemPedido->getProduto());

    $output .= '
    <tr>
    <td>' . $produto->getNome() . '</td>
    <td>' . $itemPedido->getQuantidade() . '</td>
    <td>' . $itemPedido->getPreco() . '</td>
    <td><img class="imagem_pedidos" src="uploads/' . $produto->getImagem() . '"></td>
    <td>' . $produto->getQuantidade() . ' peças</td>
  </tr>
  ';
  }

  $output .= '</table>';

}

echo $output;

$_SESSION["carrinho"] = '';

?>
