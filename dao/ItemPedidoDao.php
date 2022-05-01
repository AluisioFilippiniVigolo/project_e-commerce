<?php
interface ItemPedidoDao {

    public function insere($itemPedido);
    public function removePorPedido($pedido);
    public function altera($itemPedido);
    public function buscaPorNumeroPedido($pedido, $codigo);
    public function buscaTodos();
    public function contaTodos();
}
?>
