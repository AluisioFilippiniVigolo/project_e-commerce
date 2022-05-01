<?php

include_once('ItemPedidoDao.php');
include_once('PostgresDao.php');

class PostgresItemPedidoDao extends PostgresDao implements ItemPedidoDao {

  private $table_name = 'TITEMPEDIDO ';
  
  public function insere($itemPedido) {

    $query = "INSERT INTO " . $this->table_name . "
      (ITEPRODUTO,
      ITEPEDIDO, 
      ITEQUANTIDADE,
      ITEPRECO (:produto, 
        :pedido, 
        :quantidade, 
        :preco)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":produto", $itemPedido->getProduto());
    $stmt->bindParam(":pedido", $itemPedido->getPedido());
    $stmt->bindParam(":quantidade", $itemPedido->getQuantidade());
    $stmt->bindParam(":preco", $itemPedido->getPreco());
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorPedido($pedido) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE ITEPEDIDO = :pedido";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindParam(':pedido', $pedido);

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function altera($itemPedido) {

    $query = "UPDATE " . $this->table_name . "
    SET ITEPRODUTO = :produto, 
      ITEPEDIDO = :pedido,
      ITEQUANTIDADE = :quantidade,
      ITEPRECO = :preco";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":produto", $itemPedido->getProduto());
    $stmt->bindParam(":pedido", $itemPedido->getPedido());
    $stmt->bindParam(":quantidade", $itemPedido->getQuantidade());
    $stmt->bindParam(":preco", $itemPedido->getPreco());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorNumeroPedido($pedido, $codigo) {
      
    $itemPedido = null;

    $query = "SELECT (ITEPRODUTO, 
        ITEPEDIDO,
        ITEQUANTIDADE,
        ITEPRECO)  
      FROM 
        " . $this->table_name . "
      WHERE
        ITEPEDIDO = ? AND ITEPRODUTO = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $pedido);
    $stmt->bindParam(2, $codigo);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $itemPedido = new ItemPedido($row['ITEPRODUTO'], 
        $row['ITEPEDIDO'], 
        $row['ITEQUANTIDADE'], 
        $row['ITEPRECO']);
    } 
  
    return $itemPedido;
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

    $itemPedido = array();

    $query = "SELECT (ITEPRODUTO, 
        ITEPEDIDO,
        ITEQUANTIDADE,
        ITEPRECO)   
      FROM 
          " . $this->table_name . "
          ORDER BY id ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $itemPedido[] = new ItemPedido($produto, 
          $pedido, 
          $quantidade, 
          $preco); 
      }
    return $itemPedido;
  }

}
?>
