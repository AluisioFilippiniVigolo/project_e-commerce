<?php

include_once('FornecedorDao.php');
include_once('PostgresDao.php');

class PostgresFornecedorDao extends PostgresDao implements FornecedorDao {

  private $table_name = 'TFORNECEDOR ';
  
  public function insere($fornecedor) {

    $query = "INSERT INTO " . $this->table_name . "
      (FORCOD,
      FORNOME, 
      FORDESCRICAO,
      FORRUA,
      FORNUMERO,
      FORCOMPLEMENTO,
      FORBAIRRO,
      FORCEP,
      FORCIDADE,
      FORESTADO,
      FORTELEFONE,
      FOREMAIL)
      VALUES (:codigo, 
        :nome, 
        :descricao, 
        :rua, 
        :numero, 
        :complemento, 
        :bairro, 
        :cep, 
        :cidade, 
        :estado,
        :telefone, 
        :email)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":codigo", $fornecedor->getCodigo());
    $stmt->bindParam(":nome", $fornecedor->getNome());
    $stmt->bindParam(":descricao", $fornecedor->getLogin());
    $stmt->bindParam(":rua", $fornecedor->getRua());
    $stmt->bindParam(":numero", $fornecedor->getNumero());
    $stmt->bindParam(":complemento", $fornecedor->getComplemento());
    $stmt->bindParam(":bairro", $fornecedor->getBairro());
    $stmt->bindParam(":cep", $fornecedor->getCep());
    $stmt->bindParam(":cidade", $fornecedor->getCidade());
    $stmt->bindParam(":estado", $fornecedor->getEstado());
    $stmt->bindParam(":telefone", $fornecedor->getTelefone());
    $stmt->bindParam(":email", $fornecedor->getEmail());

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorCodigo($codigo) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE FORCOD = :codigo";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindParam(':codigo', $codigo);

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function removePorFornecedor($fornecedor) {
    return $this->removePorCodigo($fornecedor->getCodigo());
  }

  public function altera($fornecedor) {

    $query = "UPDATE " . $this->table_name . "
    SET FORCOD = :codido, 
    FORNOME = :nome,
    FORDESCRICAO = :descricao,
    FORRUA = :rua,
    FORNUMERO = :numero,
    FORCOMPLEMENTO = :complemento,
    FORBAIRRO = :bairro,
    FORCEP = :cep,
    FORCIDADE = :cidade,
    FORESTADO = :estado,
    FORTELEFONE = :telefone, 
    FOREMAIL = :email,
    WHERE FORCOD = :codigo";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":codigo", $fornecedor->getCodigo());
    $stmt->bindParam(":nome", $fornecedor->getNome());
    $stmt->bindParam(":descricao", $fornecedor->getLogin());
    $stmt->bindParam(":rua", $fornecedor->getRua());
    $stmt->bindParam(":numero", $fornecedor->getNumero());
    $stmt->bindParam(":complemento", $fornecedor->getComplemento());
    $stmt->bindParam(":bairro", $fornecedor->getBairro());
    $stmt->bindParam(":cep", $fornecedor->getCep());
    $stmt->bindParam(":cidade", $fornecedor->getCidade());
    $stmt->bindParam(":estado", $fornecedor->getEstado());
    $stmt->bindParam(":telefone", $fornecedor->getTelefone());
    $stmt->bindParam(":email", $fornecedor->getEmail());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorCodigo($codigo) {
      
    $cliente = null;

    $query = "SELECT (FORCOD, 
        FORNOME, 
        FORDESCRICAO,
        FORRUA,
        FORNUMERO,
        FORCOMPLEMENTO,
        FORBAIRRO,
        FORCEP,
        FORCIDADE,
        FORESTADO,
        FORTELEFONE,
        FOREMAIL)  
      FROM 
        " . $this->table_name . "
      WHERE
        FORCOD = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $codigo);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $fornecedor = new Fornecedor($row['FORCOD'], 
        $row['FORNOME'], 
        $row['FORDESCRICAO'], 
        $row['FORRUA'],
        $row['FORNUMERO'], 
        $row['FORCOMPLEMENTO'], 
        $row['FORBAIRRO'], 
        $row['FORCEP'], 
        $row['FORCIDADE'], 
        $row['FORESTADO'], 
        $row['FORTELEFONE'], 
        $row['FOREMAIL']);
    } 
  
    return $fornecedor;
  }

  public function buscaPorNome($palavra) {
      
    $cliente = array();        

    $query = "SELECT (FORCOD, 
        FORNOME, 
        FORDESCRICAO,
        FORRUA,
        FORNUMERO,
        FORCOMPLEMENTO,
        FORBAIRRO,
        FORCEP,
        FORCIDADE,
        FORESTADO,
        FORTELEFONE,
        FOREMAIL)  
      FROM 
        " . $this->table_name . "
      WHERE
        nome like ? ORDER BY id ASC";
  
    $stmt = $this->conn->prepare($query);
    $parametro = "%" . $palavra . "%";
    $stmt->bindParam(1, $parametro);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $fornecedor[] = new Fornecedor($codigo, 
          $nome, 
          $descricao, 
          $rua, 
          $numero, 
          $complemento, 
          $bairro, 
          $cep, 
          $cidade,
          $estado, 
          $telefone, 
          $email); 
    }

    return $fornecedor;
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

    $fornecedor = array();

    $query = "SELECT (FORCOD, 
        FORNOME, 
        FORDESCRICAO,
        FORRUA,
        FORNUMERO,
        FORCOMPLEMENTO,
        FORBAIRRO,
        FORCEP,
        FORCIDADE,
        FORESTADO,
        FORTELEFONE,
        FOREMAIL)  
      FROM 
          " . $this->table_name . "
          ORDER BY id ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $fornecedor[] = new Fornecedor($codigo, 
          $nome, 
          $descricao, 
          $rua, 
          $numero, 
          $complemento, 
          $bairro, 
          $cep, 
          $cidade,
          $estado, 
          $telefone, 
          $email); 
      }
    return $fornecedor;
  }

}
?>
