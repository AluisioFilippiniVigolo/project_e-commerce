<?php

class ItemPedido {

  private $produto;
  private $pedido;
  private $quantidade;
  private $preco;

  public function __construct($produto, $pedido, $quantidade, $preco) {
  
    $this->produto=$produto;
    $this->pedido=$pedido;
    $this->quantidade=$quantidade;
    $this->preco=$preco;
  }

  public function getProduto(){return $this->produto;}
  public function setProduto($produto){$this->produto=$produto;}

  public function getPedido(){return $this->pedido;}
  public function setPedido($pedido){$this->pedido=$pedido;}

  public function getQuantidade(){return $this->quantidade;}
  public function setQuantidade($quantidade){$this->quantidade=$quantidade;}

  public function getPreco(){return $this->preco;}
  public function setPreco($preco){$this->preco=$preco;}
}

?>