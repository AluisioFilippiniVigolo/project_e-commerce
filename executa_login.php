<?php 
// Métodos de acesso ao banco de dados 
require "fachada.php"; 
 
// Inicia sessão 
session_start();

// Recupera o login 
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
//$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE; 
 
// Usuário não forneceu a senha ou o login 
if(!$login || !$senha) 
{ 
    echo "login = " . $login . " / senha = " . $senha . "<br>";
    echo "Você deve digitar sua senha e login!<br>"; 
    echo "<a href='login.php'>Efetuar Login</a>";
    exit; 
}  

$dao = $factory->getClienteDao();
$cliente = $dao->buscaPorLogin($login);

var_dump($cliente);

$problemas = FALSE;
if($cliente) {
    if(!strcmp($senha, $cliente->getSenha())) 
    { 
        $_SESSION["id_usuario"]= $cliente->getCodigo(); 
        $_SESSION["nome_usuario"] = stripslashes($cliente->getNome());
        $_SESSION["carrinho"] = ''; 

        if (strcasecmp($_SESSION["nome_usuario"], "Admin") == 0) {
          header("Location: index_admin.php"); 
        }
        else {
          header("Location: index.php");
        }
        exit; 
    } else {
        $problemas = TRUE; 
    }
} else {
    $problemas = TRUE; 
}

if($problemas==TRUE) {
    header("Location: index.php"); 
    exit; 
}
