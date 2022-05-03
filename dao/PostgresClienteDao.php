<?php

include_once('ClienteDao.php');
include_once('PostgresDao.php');

class PostgresClienteDao extends PostgresDao implements ClienteDao {

  private $table_name = 'TCLIENTE';
  
  public function insere($cliente) {

    $query = "INSERT INTO " . $this->table_name . "
      (CLINOME, 
      CLILOGIN,
      CLISENHA,
      CLIRUA,
      CLINUMERO,
      CLICOMPLEMENTO,
      CLIBAIRRO,
      CLICEP,
      CLICIDADE,
      CLIESTADO,
      CLITELEFONE,
      CLIEMAIL,
      CLICARTAOCREDITO)
      VALUES (:nome, 
        :login,
        :senha, 
        :rua, 
        :numero, 
        :complemento, 
        :bairro, 
        :cep, 
        :cidade, 
        :estado,
        :telefone, 
        :email, 
        :cartaocredito)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":nome", $cliente->getNome());
    $stmt->bindValue(":login", $cliente->getLogin());
    //$stmt->bindValue(":senha", md5($cliente->getSenha()));
    $stmt->bindValue(":senha", $cliente->getSenha());
    $stmt->bindValue(":rua", $cliente->getRua());
    $stmt->bindValue(":numero", $cliente->getNumero());
    $stmt->bindValue(":complemento", $cliente->getComplemento());
    $stmt->bindValue(":bairro", $cliente->getBairro());
    $stmt->bindValue(":cep", $cliente->getCep());
    $stmt->bindValue(":cidade", $cliente->getCidade());
    $stmt->bindValue(":estado", $cliente->getEstado());
    $stmt->bindValue(":telefone", $cliente->getTelefone());
    $stmt->bindValue(":email", $cliente->getEmail());
    $stmt->bindValue(":cartaocredito", $cliente->getCartaoCredito());

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorCodigo($codigo) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE CLICOD = :codigo";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindValue(':codigo', $codigo);

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function removePorCliente($cliente) {
    return $this->removePorCodigo($cliente->getCodigo());
  }

  public function altera($cliente) {

    $query = "UPDATE " . $this->table_name . "
    SET CLICOD = :codido, 
    CLINOME = :nome,
    CLILOGIN = :login,
    CLISENHA = :senha,
    CLIRUA = :rua,
    CLINUMERO = :numero,
    CLICOMPLEMENTO = :complemento,
    CLIBAIRRO = :bairro,
    CLICEP = :cep,
    CLICIDADE = :cidade,
    CLIESTADO = :estado,
    CLITELEFONE = :telefone, 
    CLIEMAIL = :email,
    CLICARTAOCREDITO = :cartaocredito
    WHERE CLICOD = :codigo";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":codigo", $cliente->getCodigo());
    $stmt->bindValue(":nome", $cliente->getNome());
    $stmt->bindValue(":login", $cliente->getLogin());
    $stmt->bindValue(":senha", md5($cliente->getSenha()));
    $stmt->bindValue(":rua", $cliente->getRua());
    $stmt->bindValue(":numero", $cliente->getNumero());
    $stmt->bindValue(":complemento", $cliente->getComplemento());
    $stmt->bindValue(":bairro", $cliente->getBairro());
    $stmt->bindValue(":cep", $cliente->getCep());
    $stmt->bindValue(":cidade", $cliente->getCidade());
    $stmt->bindValue(":estado", $cliente->getEstado());
    $stmt->bindValue(":telefone", $cliente->getTelefone());
    $stmt->bindValue(":email", $cliente->getEmail());
    $stmt->bindValue(":cartaocredito", $cliente->getCartaoCredito());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorCodigo($codigo) {
      
    $cliente = null;

    $query = "SELECT CLICOD, 
        CLINOME,
        CLILOGIN,
        CLISENHA,
        CLIRUA,
        CLINUMERO,
        CLICOMPLEMENTO, 
        CLIBAIRRO,
        CLICEP,
        CLICIDADE,
        CLIESTADO,
        CLITELEFONE,
        CLIEMAIL,
        CLICARTAOCREDITO   
      FROM 
        " . $this->table_name . "
      WHERE
        CLICOD = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindValue(1, $codigo);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $cliente = new Cliente($row['CLICOD'], 
        $row['CLINOME'], 
        $row['CLILOGIN'], 
        $row['CLISENHA'], 
        $row['CLIRUA'],
        $row['CLINUMERO'], 
        $row['CLICOMPLEMENTO'], 
        $row['CLIBAIRRO'], 
        $row['CLICEP'], 
        $row['CLICIDADE'], 
        $row['CLIESTADO'], 
        $row['CLITELEFONE'], 
        $row['CLIEMAIL'], 
        $row['CLICARTAOCREDITO']);
    } 
  
    return $cliente;
  }

  public function buscaPorLogin($login) {

    $cliente = null;

    $query = "SELECT CLICOD, 
        CLINOME,
        CLILOGIN,
        CLISENHA,
        CLIRUA,
        CLINUMERO,
        CLICOMPLEMENTO, 
        CLIBAIRRO,
        CLICEP,
        CLICIDADE,
        CLIESTADO,
        CLITELEFONE,
        CLIEMAIL,
        CLICARTAOCREDITO 
      FROM 
        " . $this->table_name . "
      WHERE
        CLILOGIN = ?
      LIMIT
        1 OFFSET 0";

  $stmt = $this->conn->prepare( $query );
  $stmt->bindValue(1, $login);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($row) {
  $cliente = new Cliente($row['CLICOD'], $row['CLINOME'], $row['CLILOGIN'], $row['CLISENHA'], $row['CLIRUA'],$row['CLINUMERO'], $row['CLICOMPLEMENTO'], $row['CLIBAIRRO'], $row['CLICEP'], $row['CLICIDADE'], $row['CLIESTADO'], $row['CLITELEFONE'], $row['CLIEMAIL'], $row['CLICARTAOCREDITO']);
  } 

  return $cliente;
  }

  public function buscaPorNome($palavra) {
      
    $clientes = array();        

    $query = "SELECT CLICOD, 
        CLINOME,
        CLILOGIN,
        CLISENHA,
        CLIRUA,
        CLINUMERO,
        CLICOMPLEMENTO, 
        CLIBAIRRO,
        CLICEP,
        CLICIDADE,
        CLIESTADO,
        CLITELEFONE,
        CLIEMAIL,
        CLICARTAOCREDITO 
      FROM 
        " . $this->table_name . "
      WHERE
        CLINOME like ? ORDER BY CLICOD ASC";
  
    $stmt = $this->conn->prepare($query);
    $parametro = "%" . $palavra . "%";
    $stmt->bindValue(1, $parametro);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $clientes[] = new Cliente($clicod, 
          $clinome, 
          $clilogin, 
          $clisenha, 
          $clirua, 
          $clinumero, 
          $clicomplemento, 
          $clibairro, 
          $clicep, 
          $clicidade,
          $cliestado, 
          $clitelefone, 
          $cliemail, 
          $clicartaocredito);
    }

    return $clientes;
  }

  public function contaTodos() {

    $quantos = 0;

    $query = "SELECT COUNT(*) AS contagem FROM " . 
                $this->table_name;
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $quantos = $contagem;
    }
    
    return $quantos;
  }

  public function buscaTodos() {

    $clientes = array();

    $query = "SELECT CLICOD, 
        CLINOME,
        CLILOGIN,
        CLISENHA,
        CLIRUA,
        CLINUMERO,
        CLICOMPLEMENTO, 
        CLIBAIRRO,
        CLICEP,
        CLICIDADE,
        CLIESTADO,
        CLITELEFONE,
        CLIEMAIL,
        CLICARTAOCREDITO 
      FROM 
          " . $this->table_name . "
          ORDER BY CLICOD ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $clientes[] = new Cliente($clicod, 
          $clinome, 
          $clilogin, 
          $clisenha, 
          $clirua, 
          $clinumero, 
          $clicomplemento, 
          $clibairro, 
          $clicep, 
          $clicidade,
          $cliestado, 
          $clitelefone, 
          $cliemail, 
          $clicartaocredito);
    }
    
    return $clientes;
  }

}
?>