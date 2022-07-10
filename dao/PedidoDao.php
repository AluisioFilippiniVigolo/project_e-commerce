<?php
interface PedidoDao {

    public function insere($pedido);
    public function removePorPedido($pedido);
    public function removePorNumeroPedido($numero);
    public function altera($pedido);
    public function buscaPorNumeroDePedido($numero);
    public function buscaPorNome($palavra);
    public function buscaTodos();
    public function contaTodos();
    public function buscaNumeroUltimoPedido();
}
?>
