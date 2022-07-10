<?php

include_once('ProdutoDao.php');
include_once('PostgresDao.php');

class PostgresProdutoDao extends PostgresDao implements ProdutoDao {

  private $table_name = 'TPRODUTO ';
  
  public function insere($produto) {

    $query = "INSERT INTO " . $this->table_name . "
      (pronome, 
      prodescricao,
      profornecedor,
      proquantidade,
      propreco,
      proimagem) 
      VALUES (:nome, 
        :descricao, 
        :fornecedor, 
        :quantidade, 
        :preco,
        :imagem)";

    $stmt = $this->conn->prepare($query);


    $stmt->bindValue(":nome", $produto->getNome());
    $stmt->bindValue(":descricao", $produto->getDescricao());
    $stmt->bindValue(":fornecedor", $produto->getFornecedor());
    $stmt->bindValue(":quantidade", $produto->getQuantidade());
    $stmt->bindValue(":preco", $produto->getPreco());
    $stmt->bindValue(":imagem", $produto->getImagem());

    var_dump($stmt);

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorCodigo($codigo) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE procod = :codigo";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindValue(':codigo', $codigo);

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
    SET
      pronome = :nome,
      prodescricao = :descricao,
      profornecedor = :fornecedor,
      proquantidade = :quantidade,
      propreco = :preco,
      proimagem = :imagem
    WHERE procod = :codigo";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":codigo", $produto->getCodigo());
    $stmt->bindValue(":nome", $produto->getNome());
    $stmt->bindValue(":descricao", $produto->getDescricao());
    $stmt->bindValue(":fornecedor", $produto->getFornecedor());
    $stmt->bindValue(":quantidade", $produto->getQuantidade());
    $stmt->bindValue(":preco", $produto->getPreco());
    $stmt->bindValue(":imagem", $produto->getImagem());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorCodigo($codigo) {
      
    $produto = null;

    $query = "SELECT procod, 
        pronome,
        prodescricao,
        profornecedor,
        proquantidade,
        propreco,
        proimagem 
      FROM 
        " . $this->table_name . "
      WHERE
        procod = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindValue(1, $codigo);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $produto = new Produto($row['procod'], 
        $row['pronome'], 
        $row['prodescricao'], 
        $row['profornecedor'],
        $row['proquantidade'], 
        $row['propreco'],
        $row['proimagem']);
    } 
  
    return $produto;
  }

  public function buscaPorNome($palavra) {
      
    $produtos = array();        

    $query = "SELECT procod, 
        pronome,
        prodescricao,
        profornecedor,
        proquantidade,
        propreco,
        proimagem 
      FROM 
        " . $this->table_name . "
      WHERE
        pronome like ? ORDER BY procod ASC";
  
    $stmt = $this->conn->prepare($query);
    $parametro = "%" . $palavra . "%";
    $stmt->bindValue(1, $parametro);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $produtos[] = new Produto($procod, 
          $pronome, 
          $prodescricao, 
          $profornecedor, 
          $proquantidade, 
          $propreco,
          $proimagem); 
    }

    return $produtos;
  }

  public function buscaTodosPaginado($palavra, $inicio, $quantos) {
    
    $query = "SELECT procod,  
        pronome,
        prodescricao,
        profornecedor,
        proquantidade,
        propreco,
        proimagem 
    FROM 
      " . $this->table_name;

    if($palavra != '') {
      $query .= " WHERE UPPER(pronome) LIKE '%" . str_replace(' ', '%', strtoupper($palavra)) . "%'";
    }

    $query .= " ORDER BY procod ASC 
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

    $produtos = array();

    $query = "SELECT procod, 
        pronome,
        prodescricao,
        profornecedor,
        proquantidade,
        propreco,
        proimagem    
      FROM 
          " . $this->table_name . "
          ORDER BY procod ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $produtos[] = new Produto($procod, 
          $pronome, 
          $prodescricao, 
          $profornecedor, 
          $proquantidade, 
          $propreco,
          $proimagem);  
      }
    return $produtos; 
  }

  public function buscaProdutosJSON() {
    $produtos = $this->buscaTodos();
    $produtosJSON = array();
    foreach ($produtos as $produto) {
        $produtosJSON[] = $produto->getDadosParaJSON(); 
    }
    return stripslashes(json_encode($produtosJSON,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  }

  public function buscaProdutoJSON($codigo) {
      $produto = $this->buscaPorCodigo($codigo);
      if($produto!=null) {
          return stripslashes(json_encode($produto->getDadosParaJSON(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
      } else {
          return null;
      }
  }

}
?>
