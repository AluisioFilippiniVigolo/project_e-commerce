<?php
interface ClienteDao {

    public function insere($cliente);
    public function removePorCliente($cliente);
    public function removePorCodigo($codigo);
    public function altera($cliente);
    public function buscaPorCodigo($codigo);
    public function buscaPorLogin($login);
    public function buscaPorNome($palavra);
    public function buscaTodosPaginado($palavra, $inicio, $quantos);
    public function buscaTodosPaginadoJSON($palavra, $inicio, $quantos);
    public function buscaTodos();
    public function contaTodos();
}
?>
