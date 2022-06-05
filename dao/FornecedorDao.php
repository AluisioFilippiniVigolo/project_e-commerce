<?php
interface FornecedorDao {

    public function insere($fornecedor);
    public function removePorFornecedor($fornecedor);
    public function removePorCodigo($codigo);
    public function altera($fornecedor);
    public function buscaPorCodigo($codigo);
    public function buscaPorNome($palavra);
    public function buscaTodosPaginado($palavra, $inicio, $quantos);
    public function buscaTodos();
    public function contaTodos();
}
?>
