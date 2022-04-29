<?php

include_once('PedidoDao.php');
include_once('PostgresDao.php');

class PostgresPedidoDao extends PostgresDao implements PedidoDao {

  private $table_name = 'TPEDIDO ';
  
  public function insere($pedido) {

    $query = "INSERT INTO " . $this->table_name . "
      (PEDNUMERO,
      PEDCLIENTE, 
      PEDDATAPEDIDO,
      PEDDATAENTREGA,
      PEDSITUACAO)
      VALUES (:numero, 
        :cliente, 
        :dataPedido, 
        :dataEntrega, 
        :situacao)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":numero", $pedido->getNumero());
    $stmt->bindParam(":cliente", $pedido->getCliente());
    $stmt->bindParam(":dataPedido", $pedido->getDataPedido());
    $stmt->bindParam(":dataEntrega", $pedido->getDataEntrega());
    $stmt->bindParam(":situacao", $pedido->getSituacao());
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

  }

  public function removePorNumeroPedido($numero) {
    $query = "DELETE FROM " . $this->table_name . 
    " WHERE PEDNUMERO = :numero";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindParam(':numero', $numero);

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function removePorPedido($pedido)
  {
    return $this->removePorNumeroPedido($pedido->getNumero()); 
  }

  public function altera($pedido) {

    $query = "UPDATE " . $this->table_name . "
    SET PEDNUMERO = :numero, 
      PEDCLIENTE = :cliente,
      PEDDATAPEDIDO = :dataPedido,
      PEDDATAENTREGA = :dataEntrega,
      PEDSITUACAO = :situacao";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":numero", $pedido->getNumero());
    $stmt->bindParam(":cliente", $pedido->getCliente());
    $stmt->bindParam(":dataPedido", $pedido->getDataPedido());
    $stmt->bindParam(":dataEntrega", $pedido->getDataEntrega());
    $stmt->bindParam(":situacao", $pedido->getSituacao());

    // execute the query
    if($stmt->execute()){
        return true;
    }    

    return false;
  }

  public function buscaPorNumeroDePedido($numero) {
      
    $pedido = null;

    $query = "SELECT (PEDNUMERO, 
        PEDCLIENTE,
        PEDDATAPEDIDO,
        PEDDATAENTREGA,
        PEDSITUACAO)  
      FROM 
        " . $this->table_name . "
      WHERE
        PEDNUMERO = ?
      LIMIT
        1 OFFSET 0";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $numero);
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $pedido = new Pedido($row['PEDNUMERO'], 
        $row['PEDCLIENTE'], 
        $row['PEDDATAPEDIDO'], 
        $row['PEDDATAENTREGA'],
        $row['PEDSITUACAO']);
    } 
  
    return $pedido;
  }

  public function buscaPorNome($palavra) {
      
    $produto = array();        

    $query = "SELECT (PEDNUMERO, 
        PEDCLIENTE,
        PEDDATAPEDIDO,
        PEDDATAENTREGA,
        PEDSITUACAO)  
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
        $pedido[] = new Pedido($numero, 
          $cliente, 
          $dataPedido, 
          $dataEntrega, 
          $situacao); 
    }

    return $pedido;
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

    $pedido = array();

    $query = "SELECT (PEDNUMERO, 
        PEDCLIENTE,
        PEDDATAPEDIDO,
        PEDDATAENTREGA,
        PEDSITUACAO)   
      FROM 
          " . $this->table_name . "
          ORDER BY id ASC";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $pedido[] = new Pedido($numero, 
          $cliente, 
          $dataPedido, 
          $dataEntrega, 
          $situacao); 
      }
    return $pedido;
  }

}
?>
