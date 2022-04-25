<?php

class Pedido {

  private $numero;
  private $cliente;
  private $dataPedido;
  private $dataEntrega;
  private $situacao;

  public function __construct($numero, $cliente, $dataPedido, $dataEntrega, $situacao) {
  
    $this->numero=$numero;
    $this->cliente=$cliente;
    $this->dataPedido=$dataPedido;
    $this->dataEntrega=$dataEntrega;
    $this->situacao=$situacao;
  }

  public function getNumero(){return $this->numero;}
  public function setNumero($numero){$this->numero=$numero;}

  public function getCliente(){return $this->cliente;}
  public function setCliente($cliente){$this->cliente=$cliente;}

  public function getDataPedido(){return $this->dataPedido;}
  public function setDataPedido($dataPedido){$this->dataPedido=$dataPedido;}

  public function getDataEntrega(){return $this->dataEntrega;}
  public function setDataEntrega($dataEntrega){$this->dataEntrega=$dataEntrega;}

  public function getSituacao(){return $this->situacao;}
  public function setSituacao($situacao){$this->situacao=$situacao;}
}

?>