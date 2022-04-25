<?php

class Cliente {
    
  private $codigo;
  private $nome;
  private $login;
  private $senha;
  private $rua;
  private $numero;
  private $complemento;
  private $bairro;
  private $cep;
  private $cidade;
  private $estado;
  private $telefone;
  private $email;
  private $cartaoCredito;

  public function __construct(
    $codigo, $nome, $login, $senha, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email, $cartaoCredito)
  {
    $this->codigo=$codigo;
    $this->nome=$nome;
    $this->login=$login;
    $this->senha=$senha;
    $this->rua=$rua;
    $this->numero=$numero;
    $this->complemento=$complemento;
    $this->bairro=$bairro;
    $this->cep=$cep;
    $this->cidade=$cidade;
    $this->estado=$estado;
    $this->telefone=$telefone;
    $this->email=$email;
    $this->cartaoCredito=$cartaoCredito;
  }

  public function getCodigo() { return $this->codigo; }
  public function setCodigo($codigo) {$this->codigo = $codigo;}

  public function getNome() { return $this->nome; }
  public function setNome($nome) {$this->login = $nome;}

  public function getLogin() { return $this->login; }
  public function setLogin($login) {$this->login = $login;}

  public function getSenha() { return $this->senha; }
  public function setSenha($senha) {$this->senha = $senha;}

  public function getRua() { return $this->rua; }
  public function setRua($rua) {$this->rua = $rua;}

  public function getNumero() { return $this->numero; }
  public function setNumero($numero) {$this->numero = $numero;}

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
  public function setTelefone($telefone) {$this->telefone = $telefone;}
    
  public function getEmail() { return $this->email; }
  public function setEmail($email) {$this->email = $email;}
    
  public function getCartaoCredito() { return $this->cartaoCredito; }
  public function setCartaoCredito($cartaoCredito) {$this->cartaoCredito = $cartaoCredito;}
}
?>