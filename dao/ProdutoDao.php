<?php
interface ProdutoDao {

    public function insere($produto);
    public function removePorProduto($produto);
    public function removePorCodigo($codigo);
    public function altera($produto);
    public function buscaPorCodigo($codigo);
    public function buscaPorNome($palavra);
    public function buscaTodos();
    public function contaTodos();
}
?>