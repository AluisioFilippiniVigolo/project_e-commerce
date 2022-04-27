<?php
interface ItemPedidoDao {

    public function insere($pedido);
    public function removePorCodigo($codigo);
    public function altera($pedido);
    public function buscaPorCodigo($codigo);
    public function buscaTodos();
    public function contaTodos();
}
?>
