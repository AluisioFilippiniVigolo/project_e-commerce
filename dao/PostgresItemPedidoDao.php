<?php

include_once('ItemPedidoDao.php');
include_once('PostgresDao.php');

class PostgresItemPedidoDao extends PostgresDao implements ItemPedidoDao {

  private $table_name = 'TITEMPEDIDO ';
  
  public function insere($itemPedido) {

    $query = "INSERT INTO " . $this->table_name . "
      (Iteproduto,
      itepedido, 
      itequantidade,
      itepreco)
      VALUES (:produto, 
        :pedido, 
        :quantidade, 
        :preco)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":produto", $itemPedido->getProduto());
    $stmt->bindValue(":pedido", $itemPedido->getPedido());
    $stmt->bindValue(":quantidade", $itemPedido->getQuantidade());
    $stmt->bindValue(":preco", $itemPedido->getPreco());
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorPedido($pedido) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE itepedido = :pedido";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindValue(':pedido', $pedido);

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function altera($itemPedido) {

    $query = "UPDATE " . $this->table_name . "
    SET iteproduto = :produto, 
      itepedido = :pedido,
      itequantidade = :quantidade,
      itepreco = :preco";

    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":produto", $itemPedido->getProduto());
    $stmt->bindValue(":pedido", $itemPedido->getPedido());
    $stmt->bindValue(":quantidade", $itemPedido->getQuantidade());
    $stmt->bindValue(":preco", $itemPedido->getPreco());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorNumeroPedido($pedido, $codigo) {
      
    $itemPedido = null;

    $query = "SELECT (iteproduto, 
        itepedido,
        itequantidade,
        itepreco)  
      FROM 
        " . $this->table_name . "
      WHERE
        itepedido = ? AND iteproduto = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindValue(1, $pedido);
    $stmt->bindValue(2, $codigo);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $itemPedido = new ItemPedido($row['iteproduto'], 
        $row['itepedido'], 
        $row['itequantidade'], 
        $row['itepreco']);
    } 
  
    return $itemPedido;
  }

  public function buscaTodosPorNumeroPedido($pedido) { 
      
    $itensPedido = null;

    $query = "SELECT iteproduto, 
        itepedido,
        itequantidade,
        itepreco 
      FROM 
        " . $this->table_name . "
      WHERE
        itepedido = ?
      ";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindValue(1, $pedido);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $itensPedido[] = new ItemPedido($iteproduto, 
          $itepedido, 
          $itequantidade, 
          $itepreco); 
      }
    return $itensPedido;
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

    $itemPedidos = array();

    $query = "SELECT (iteproduto, 
        itepedido,
        itequantidade,
        itepreco)   
      FROM 
          " . $this->table_name . "
          ORDER BY id ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $itemPedidos[] = new ItemPedido($produto, 
          $pedido, 
          $quantidade, 
          $preco); 
      }
    return $itemPedidos;
  }

}
?>
