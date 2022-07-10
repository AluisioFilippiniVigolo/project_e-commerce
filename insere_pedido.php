<?php
  include_once "fachada.php";
  include_once "layout_header.php";
  $usuario = $_SESSION["id_usuario"];

  $daoProduto = $factory->getProdutoDao(); 
  $daoCliente = $factory->getClienteDao();
  $daoPedido = $factory->getPedidoDao();
  $daoItemPedido = $factory->getItemPedidoDao();

  $cliente = null;
  $pedido = null;

  //$cliente = $daoCliente->buscaPorCodigo($usuario);
  $data_pedido = date('d/m/Y');
  $data_entrega = date('d/m/Y');
  $situacao = "Pedido recebido";
  $pedido = new Pedido(null, $usuario, $data_pedido, $data_entrega, $situacao);
  $daoPedido->insere($pedido);
  $numero_pedido = $daoPedido->buscaNumeroUltimoPedido();

  $codigos = explode(";", $_SESSION["carrinho"]);
  foreach ($codigos as $codigo) {
    if($codigo != '') {
      $produto = null;
      $item_pedido = null;
      $quantidade = 1;
      $produto = $daoProduto->buscaPorCodigo($codigo);
      $daoProduto->baixaEstoque($produto, $quantidade);
      $item_pedido = new ItemPedido($codigo, $numero_pedido, $quantidade, $produto->getPreco());
      $daoItemPedido->insere($item_pedido);
    }
  }

  header("Location: pedido.php");
exit;

?>