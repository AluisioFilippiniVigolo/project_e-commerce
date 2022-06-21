<?php

class Produto {

  private $codigo;
  private $nome;
  private $descricao;
  private $fornecedor;
  private $quantidade;
  private $preco;
  private $imagem;

  public function __construct($codigo, $nome, $descricao, $fornecedor, $quantidade, $preco, $imagem)
  {
    $this->codigo=$codigo;
    $this->nome=$nome;
    $this->descricao=$descricao;
    $this->fornecedor=$fornecedor;
    $this->quantidade=$quantidade;
    $this->preco=$preco;
    $this->imagem=$imagem;
  }

  public function getCodigo(){return $this->codigo;}
  public function setCodigo($codigo){$this->codigo=$codigo;}

  public function getNome(){return $this->nome;}
  public function setNome($nome){$this->nome=$nome;}

  public function getDescricao(){return $this->descricao;}
  public function setDescricao($descricao){$this->descricao=$descricao;}

  public function getFornecedor(){return $this->fornecedor;}
  public function setFornecedor($fornecedor){$this->fornecedor=$fornecedor;}

  public function getQuantidade(){return $this->quantidade;}
  public function setQuantidade($quantidade){$this->quantidade=$quantidade;}

  public function getPreco(){return $this->preco;}
  public function setPreco($preco){$this->preco=$preco;}

  public function getImagem(){return $this->imagem;}
  public function setImagem($imagem){$this->imagem=$imagem;}

  public function getDadosParaJSON() {
    $data = ['codigo' => $this->codigo, 'nome' => $this->nome, 'descricao' => $this->descricao, 'fornecedor' => $this->fornecedor, 'quantidade' => $this->quantidade, 'preco' => $this->preco, 'imagem' => $this->imagem];
    return $data;
}
}
?>