<?php

class Fornecedor {
    
  private $codigo;
  private $nome;
  private $descricao;
  private $rua;
  private $numero;
  private $complemento;
  private $bairro;
  private $cep;
  private $cidade;
  private $estado;
  private $telefone;
  private $email;

  public function __construct(
    $codigo, $nome, $descricao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email)
  {
    $this->codigo=$codigo;
    $this->nome=$nome;
    $this->descricao=$descricao;
    $this->rua=$rua;
    $this->numero=$numero;
    $this->complemento=$complemento;
    $this->bairro=$bairro;
    $this->cep=$cep;
    $this->cidade=$cidade;
    $this->estado=$estado;
    $this->telefone=$telefone;
    $this->email=$email;
  }

  public function getCodigo() { return $this->codigo; }
  public function setCodigo($codigo) {$this->codigo = $codigo;}

  public function getNome() { return $this->nome; }
  public function setNome($nome) {$this->login = $nome;}

  public function getDescricao() { return $this->descricao; }
  public function setDescricao($descricao) {$this->descricao = $descricao;}

  public function getRua() { return $this->rua; }
  public function setRua($rua) {$this->rua = $rua;}

  public function getNumero() { return $this->numero; }
  public function setSenha($numero) {$this->numero = $numero;}

  public function getComplemento() { return $this->complemento; }
  public function setComplemento($complemento) {$this->complemento = $complemento;}
  
  public function getBairro() { return $this->bairro; }
  public function setBairro($bairro) {$this->bairro = $bairro;}
  
  public function getCep() { return $this->cep; }
  public function setCep($cep) {$this->cep = $cep;}
  
  public function getCidade() { return $this->cidade; }
  public function setCidade($cidade) {$this->cidade = $cidade;}

  public function getEstado() { return $this->estado; }
  public function setId($estado) {$this->estado = $estado;}
    
  public function getTelefone() { return $this->telefone; }
  public function setLogin($telefone) {$this->telefone = $telefone;}
    
  public function getEmail() { return $this->email; }
  public function setEmail($email) {$this->email = $email;}
}
?>