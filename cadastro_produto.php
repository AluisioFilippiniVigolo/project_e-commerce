<?php
  $page_title = 'Cadastro de Produto';
  include_once "layout_header.php";
  include_once "layout_footer.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Produto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <section class="container">
        <div class="col-md-4">
            <div class="panel panel-default panel-login">
                <div class="panel-heading text-center">
                    Cadastro Produto
                </div>
                <div class="panel-body">
                    <form action="insere_produto.php" method="POST">
                        <div class="input-group">
                            <input type="text" name="nome" placeholder="Nome" class="form-control">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="descricao" placeholder="Descricao" class="form-control">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="fornecedor" placeholder="Fornecedor " class="form-control">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="quantidade" placeholder="Quantidade" class="form-control">
                        </div>
                        <div class="input-group">
                            <input type="text" name="preco" placeholder="Preço" class="form-control">
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>6
                </div>
            </div>
        </div>
                </section>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
</body>

</html>