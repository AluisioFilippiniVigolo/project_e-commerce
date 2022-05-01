<?php

include_once('model/Cliente.php');
include_once('model/Fornecedor.php');
include_once('model/ItemPedido.php');
include_once('model/Pedido.php');
include_once('model/Produto.php');

include_once('dao/cliente_dao/ClienteDao.php');
include_once('dao/fornecedor_dao/FornecedorDao.php');
include_once('dao/itempedido_dao/ItemPedidoDao.php');
include_once('dao/pedido_dao/PedidoDao.php');
include_once('dao/produto_dao/ProdutoDao.php');


include_once('dao/DaoFactory.php');
include_once('dao/PostgresDaoFactory.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$factory = new PostgresDaofactory();

?>