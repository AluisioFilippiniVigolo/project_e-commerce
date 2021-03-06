<?php

include_once('FornecedorDao.php');
include_once('PostgresDao.php');

class PostgresFornecedorDao extends PostgresDao implements FornecedorDao {

  private $table_name = 'TFORNECEDOR ';
  
  public function insere($fornecedor) {

    $query = "INSERT INTO " . $this->table_name . "
      (fornome, 
      fordescricao,
      forrua,
      fornumero,
      forcomplemento,
      forbairro,
      forcep,
      forcidade,
      forestado,
      fortelefone,
      foremail)
      VALUES (:nome, 
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

    $stmt->bindValue(":nome", $fornecedor->getNome());
    $stmt->bindValue(":descricao", $fornecedor->getDescricao());
    $stmt->bindValue(":rua", $fornecedor->getRua());
    $stmt->bindValue(":numero", $fornecedor->getNumero());
    $stmt->bindValue(":complemento", $fornecedor->getComplemento());
    $stmt->bindValue(":bairro", $fornecedor->getBairro());
    $stmt->bindValue(":cep", $fornecedor->getCep());
    $stmt->bindValue(":cidade", $fornecedor->getCidade());
    $stmt->bindValue(":estado", $fornecedor->getEstado());
    $stmt->bindValue(":telefone", $fornecedor->getTelefone());
    $stmt->bindValue(":email", $fornecedor->getEmail());

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorCodigo($codigo) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE forcod = :codigo";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindValue(':codigo', $codigo);

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
    SET
      fornome = :nome,
      fordescricao = :descricao,
      forrua = :rua,
      fornumero = :numero,
      forcomplemento = :complemento,
      forbairro = :bairro,
      forcep = :cep,
      forcidade = :cidade,
      forestado = :estado,
      fortelefone = :telefone, 
      foremail = :email
    WHERE
      forcod = :codigo";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":codigo", $fornecedor->getCodigo());
    $stmt->bindValue(":nome", $fornecedor->getNome());
    $stmt->bindValue(":descricao", $fornecedor->getDescricao());
    $stmt->bindValue(":rua", $fornecedor->getRua());
    $stmt->bindValue(":numero", $fornecedor->getNumero());
    $stmt->bindValue(":complemento", $fornecedor->getComplemento());
    $stmt->bindValue(":bairro", $fornecedor->getBairro());
    $stmt->bindValue(":cep", $fornecedor->getCep());
    $stmt->bindValue(":cidade", $fornecedor->getCidade());
    $stmt->bindValue(":estado", $fornecedor->getEstado());
    $stmt->bindValue(":telefone", $fornecedor->getTelefone());
    $stmt->bindValue(":email", $fornecedor->getEmail());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorCodigo($codigo) {
      
    $fornecedor = null;

    $query = "SELECT forcod, 
        fornome, 
        fordescricao,
        forrua,
        fornumero,
        forcomplemento,
        forbairro,
        forcep,
        forcidade,
        forestado,
        fortelefone,
        foremail  
      FROM 
        " . $this->table_name . "
      WHERE
        forcod = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindValue(1, $codigo);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $fornecedor = new Fornecedor($row['forcod'], 
        $row['fornome'], 
        $row['fordescricao'], 
        $row['forrua'],
        $row['fornumero'], 
        $row['forcomplemento'], 
        $row['forbairro'], 
        $row['forcep'], 
        $row['forcidade'], 
        $row['forestado'], 
        $row['fortelefone'], 
        $row['foremail']);
    } 
  
    return $fornecedor;
  }

  public function buscaPorNome($palavra) {
      
    $fornecedores = array();        

    $query = "SELECT forcod, 
        fornome, 
        fordescricao,
        forrua,
        fornumero,
        forcomplemento,
        forbairro,
        forcep,
        forcidade,
        forestado,
        fortelefone,
        foremail  
      FROM 
        " . $this->table_name . "
      WHERE
        fornome like ? ORDER BY forcod ASC";
  
    $stmt = $this->conn->prepare($query);
    $parametro = "%" . $palavra . "%";
    $stmt->bindValue(1, $parametro);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $fornecedores[] = new Fornecedor($forcod, 
          $fornome, 
          $fordescricao, 
          $forrua, 
          $fornumero, 
          $forcomplemento, 
          $forbairro, 
          $forcep, 
          $forcidade,
          $forestado, 
          $fortelefone, 
          $foremail); 
    }

    return $fornecedores;
  }

  public function buscaTodosPaginado($palavra, $inicio, $quantos) {

    $query = "SELECT forcod, 
        fornome, 
        fordescricao,
        forrua,
        fornumero,
        forcomplemento,
        forbairro,
        forcep,
        forcidade,
        forestado,
        fortelefone,
        foremail  
    FROM 
      " . $this->table_name;

    if($palavra != '') {
      $query .= " WHERE UPPER(fornome) LIKE '%" . str_replace(' ', '%', strtoupper($palavra)) . "%'";
    }

    $query .= " ORDER BY forcod ASC 
    LIMIT ? OFFSET ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(1, $quantos);
    $stmt->bindValue(2, $inicio);
    $stmt->execute();

    return $stmt->fetchAll();
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

    $fornecedores = array();

    $query = "SELECT forcod, 
        fornome, 
        fordescricao,
        forrua,
        fornumero,
        forcomplemento,
        forbairro,
        forcep,
        forcidade,
        forestado,
        fortelefone,
        foremail  
      FROM 
          " . $this->table_name . "
          ORDER BY forcod ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $fornecedores[] = new Fornecedor($forcod, 
          $fornome, 
          $fordescricao, 
          $forrua, 
          $fornumero, 
          $forcomplemento, 
          $forbairro, 
          $forcep, 
          $forcidade,
          $forestado, 
          $fortelefone, 
          $foremail); 
      }
    return $fornecedores;
  }

}
?>
