<?php
  include_once "fachada.php";
  include_once "layout_header.php";
  $usuario = $_SESSION["id_usuario"];
  $carrinho = $_SESSION["carrinho"];

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

  $codigos = explode(";", $carrinho);
  foreach ($codigos as $codigo) {
    if($codigo != '') {
      $produto = null;
      $produto = $daoProduto->buscaPorCodigo($codigo);
      $item_pedido = new ItemPedido($codigo, $pedido->getNumero(), $quantidade, $produto->getPreco());
      $daoItemPedido->insere($item_pedido);
    }
  }

?>