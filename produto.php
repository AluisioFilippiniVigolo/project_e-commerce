<?php

// Métodos de acesso ao banco de dados 
require "fachada.php"; 

$dao = $factory->getProdutoDao(); 

$request_method = $_SERVER["REQUEST_METHOD"];
	
switch($request_method)
 {
 case 'GET':
    if(!empty($_GET["codigo"]))
    {
        $codigo=intval($_GET["codigo"]);
        $produtoJSON = $dao->buscaProdutoJSON($codigo);
        if($produtoJSON!=null) {
            echo $produtoJSON;
            http_response_code(200); // 200 OK
        } else {
            http_response_code(404); // 404 Not Found
        }
    }
    else
    {
        echo $dao->buscaProdutosJSON();
        http_response_code(200); // 200 OK
    }
    break;
 case 'POST':
    $data = json_decode(file_get_contents('php://input'), true);
    $codigo = $data["codigo"];
    $nome = $data["nome"];
    $descricao = $data["descricao"];
    $quantidade = $data["quantidade"];
    $preco = $data["preco"];
    $produto = new Produto(null, $nome, $descricao, $fornecedor, $quantidade, $preco, $imagem);
    $dao->insere($produto);
    http_response_code(201); // 201 Created
    break;
 case 'PUT':
    if(!empty($_GET["codigo"]))
    {
       $codigo=intval($_GET["codigo"]);
       $produto = $dao->buscaPorCodigo($codigo);
       if($produto!=null) {
            $data = json_decode(file_get_contents('php://input'), true);
            $produto->setCodigo($data["codigo"]);
            $produto->setNome($data["nome"]);
            $produto->setDescricao($data["descricao"]);
            $produto->setQuantidade($data["quantidade"]);
            $produto->setPreco($data["preco"]);
            $dao->altera($turma);
            http_response_code(200); // 200 OK
       } else {
        http_response_code(404); // 404 Not Found
       }
    }
    break;
 case 'DELETE':
    if(!empty($_GET["codigo"]))
    {
       $codigo=intval($_GET["codigo"]);
       $dao->removePorCodigo($codigo);
       http_response_code(204);
    }
    break;
 default:
    // Invalid Request Method
    http_response_code(405); // 405 Method Not Allowed
    break;
 }