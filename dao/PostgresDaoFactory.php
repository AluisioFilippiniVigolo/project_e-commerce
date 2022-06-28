<?php

include_once('DaoFactory.php');
include_once('FachadaPostgressDao.php');

class PostgresDaofactory extends DaoFactory {

    // specify your own database credentials
    private $host = "kesavan.db.elephantsql.com";
    private $db_name = "gkhmvzjs";
    private $port = "5432";
    private $username = "gkhmvzjs";
    private $password = "EsF7MoiM9wsf5P-79-5XJOXHJ1V-ONiz";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            //$this->conn = new PDO("pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
            //$this->conn = new PDO("pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn = new PDO("pgsql:host=kesavan.db.elephantsql.com;port=5432;dbname=gkhmvzjs", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
      }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getClienteDao() {
        return new PostgresClienteDao($this->getConnection());
    }

    public function getFornecedorDao() {
        return new PostgresFornecedorDao($this->getConnection());
    }

    public function getProdutoDao() {
        return new PostgresProdutoDao($this->getConnection());
    }

    public function getPedidoDao() {
      return new PostgresPedidoDao($this->getConnection());
    }

    public function getItemPedidoDao() {
      return new PostgresItemPedidoDao($this->getConnection());
    }
}
?>
