<?php

include_once('ProdutoDao.php');
include_once('PostgresDao.php');

class PostgresProdutoDao extends PostgresDao implements ProdutoDao {

  private $table_name = 'TPRODUTO ';
  
  public function insere($produto) {

    $query = "INSERT INTO " . $this->table_name . "
      (PROCOD,
      PRONOME, 
      PRODESCRICAO,
      PROFORNECEDOR,
      PROQUANTIDADE,
      PROPRECO)
      VALUES (:codigo, 
        :nome, 
        :descricao, 
        :fornecedor, 
        :quantidade, 
        :preco)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":codigo", $produto->getCodigo());
    $stmt->bindValue(":nome", $produto->getNome());
    $stmt->bindValue(":descricao", $produto->getDescricao());
    $stmt->bindValue(":fornecedor", $produto->getFornecedor());
    $stmt->bindValue(":quantidade", $produto->getQuantidade());
    $stmt->bindValue(":preco", $produto->getPreco());

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorCodigo($codigo) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE PROCOD = :codigo";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindParam(':codigo', $codigo);

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function removePorProduto($produto)
  {
    return $this->removePorCodigo($produto->getCodigo()); 
  }

  public function altera($produto) {

    $query = "UPDATE " . $this->table_name . "
    SET PROCOD = :codido, 
      PRONOME = :nome,
      PRODESCRICAO = :descricao,
      PROFORNECEDOR = :fornecedor,
      PROQUANTIDADE = :quantidade,
      PROPRECO = :preco";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":codigo", $produto->getCodigo());
    $stmt->bindValue(":nome", $produto->getNome());
    $stmt->bindValue(":descricao", $produto->getDescricao());
    $stmt->bindValue(":fornecedor", $produto->getFornecedor());
    $stmt->bindValue(":quantidade", $produto->getQuantidade());
    $stmt->bindValue(":preco", $produto->getPreco());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorCodigo($codigo) {
      
    $produto = null;

    $query = "SELECT (PROCOD, 
        PRONOME,
        PRODESCRICAO,
        PROFORNECEDOR,
        PROQUANTIDADE,
        PROPRECO)  
      FROM 
        " . $this->table_name . "
      WHERE
        FORCOD = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindValue(1, $codigo);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $produto = new Produto($row['PROCOD'], 
        $row['PRONOME'], 
        $row['PRODESCRICAO'], 
        $row['PROFORNECEDOR'],
        $row['PROQUANTIDADE'], 
        $row['PROPRECO']);
    } 
  
    return $produto;
  }

  public function buscaPorNome($palavra) {
      
    $produto = array();        

    $query = "SELECT (PROCOD, 
        PRONOME,
        PRODESCRICAO,
        PROFORNECEDOR,
        PROQUANTIDADE,
        PROPRECO)  
      FROM 
        " . $this->table_name . "
      WHERE
        nome like ? ORDER BY id ASC";
  
    $stmt = $this->conn->prepare($query);
    $parametro = "%" . $palavra . "%";
    $stmt->bindValue(1, $parametro);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $produto[] = new Produto($codigo, 
          $nome, 
          $descricao, 
          $fornecedor, 
          $quantidade, 
          $preco); 
    }

    return $produto;
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

    $produto = array();

    $query = "SELECT (PROCOD, 
        PRONOME,
        PRODESCRICAO,
        PROFORNECEDOR,
        PROQUANTIDADE,
        PROPRECO)    
      FROM 
          " . $this->table_name . "
          ORDER BY id ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $produto[] = new Produto($codigo, 
          $nome, 
          $descricao, 
          $fornecedor, 
          $quantidade, 
          $preco); 
      }
    return $produto;
  }

}
?>
