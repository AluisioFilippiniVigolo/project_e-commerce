<?php

include_once('ClienteDao.php');
include_once('PostgresDao.php');

class PostgresClienteDao extends PostgresDao implements ClienteDao {

    private $table_name = 'TCLIENTE';
    
    public function insere($cliente) {

        $query = "INSERT INTO " . $this->table_name . 
        " (CLICOD, " .
        " CLINOME, " .
        " CLILOGIN, " .
        " CLISENHA, " .
        " CLIRUA, " .
        " CLINUMERO, " .
        " CLICOMPLEMENTO, " . 
        " CLIBAIRRO, " .
        " CLICEP, " .
        " CLICIDADE, " .
        " CLIESTADO, " .
        " CLITELEFONE, " .
        " CLIEMAIL, " .
        " CLICARTAOCREDITO) " .
        " VALUES (:codigo, :nome, :login, :senha, :rua, :numero, :complemento, :bairro, :cep, :cidade, :estado, :telefone, :email, :cartaocredito)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":codigo", $cliente->getCodigo());
        $stmt->bindParam(":nome", $cliente->getNome());
        $stmt->bindParam(":login", $cliente->getLogin());
        $stmt->bindParam(":senha", md5($cliente->getSenha()));
        $stmt->bindParam(":rua", $cliente->getRua());
        $stmt->bindParam(":numero", $cliente->getNumero());
        $stmt->bindParam(":complemento", $cliente->getComplemento());
        $stmt->bindParam(":bairro", $cliente->getBairro());
        $stmt->bindParam(":cep", $cliente->getCep());
        $stmt->bindParam(":cidade", $cliente->getCidade());
        $stmt->bindParam(":estado", $cliente->getEstado());
        $stmt->bindParam(":telefone", $cliente->getTelefone());
        $stmt->bindParam(":email", $cliente->getEmail());
        $stmt->bindParam(":cartaocredito", $cliente->getCartaoCredito());

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
        $stmt->bindParam(':codigo', $codigo);

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

        $stmt->bindParam(":codigo", $cliente->getCodigo());
        $stmt->bindParam(":nome", $cliente->getNome());
        $stmt->bindParam(":login", $cliente->getLogin());
        $stmt->bindParam(":senha", md5($cliente->getSenha()));
        $stmt->bindParam(":rua", $cliente->getRua());
        $stmt->bindParam(":numero", $cliente->getNumero());
        $stmt->bindParam(":complemento", $cliente->getComplemento());
        $stmt->bindParam(":bairro", $cliente->getBairro());
        $stmt->bindParam(":cep", $cliente->getCep());
        $stmt->bindParam(":cidade", $cliente->getCidade());
        $stmt->bindParam(":estado", $cliente->getEstado());
        $stmt->bindParam(":telefone", $cliente->getTelefone());
        $stmt->bindParam(":email", $cliente->getEmail());
        $stmt->bindParam(":cartaocredito", $cliente->getCartaoCredito());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorCodigo($codigo) {
        
        $cliente = null;

        $query = "SELECT (CLICOD, 
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
                    CLICARTAOCREDITO) 
                FROM 
                    " . $this->table_name . "
                WHERE
                    CLICOD = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $codigo);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $cliente = new Cliente($row['CLICOD'], $row['CLINOME'], $row['CLILOGIN'], $row['CLISENHA'], $row['CLIRUA'],$row['CLINUMERO'], $row['CLICOMPLEMENTO'], $row['CLIBAIRRO'], $row['CLICEP'], $row['CLICIDADE'], $row['CLIESTADO'], $row['CLITELEFONE'], $row['CLIEMAIL'], $row['CLICARTAOCREDITO']);
        } 
     
        return $cliente;
    }

    public function buscaPorLogin($login) {

        $cliente = null;

        $query = "SELECT (CLICOD, 
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
                    CLICARTAOCREDITO) 
                FROM 
                    " . $this->table_name . "
                WHERE
                    login = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $login);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
          $cliente = new Cliente($row['CLICOD'], $row['CLINOME'], $row['CLILOGIN'], $row['CLISENHA'], $row['CLIRUA'],$row['CLINUMERO'], $row['CLICOMPLEMENTO'], $row['CLIBAIRRO'], $row['CLICEP'], $row['CLICIDADE'], $row['CLIESTADO'], $row['CLITELEFONE'], $row['CLIEMAIL'], $row['CLICARTAOCREDITO']);
        } 
     
        return $cliente;
    }

    public function buscaPorNome($palavra) {
        
        $cliente = array();        
	
  
        $query = "SELECT (CLICOD, 
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
                    CLICARTAOCREDITO) 
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
            $cliente[] = new Cliente($codigo, $nome, $login, $senha, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email, $cartaocredito);
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

        $cliente = array();

        $query = "SELECT (CLICOD, 
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
                    CLICARTAOCREDITO) 
                FROM 
                    " . $this->table_name . "
                    ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $cliente[] = new Cliente($codigo, $nome, $login, $senha, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $telefone, $email, $cartaocredito);
        }
        
        return $cliente;
    }

}
?>
