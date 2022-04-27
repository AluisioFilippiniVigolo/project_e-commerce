<?php
interface PedidoDao {

    public function insere($pedido);
    public function removePorPedido($pedido);
    public function removePorCodigo($codigo);
    public function altera($pedido);
    public function buscaPorCodigo($codigo);
    public function buscaPorNome($palavra);
    public function buscaTodos();
    public function contaTodos();
}
?>
