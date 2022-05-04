<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro Fornecedor</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
  <div class="container">
    <div class="col-md-4"></div>

    <div class="col-md-4">
      <div class="panel panel-default panel-login">
        <div class="panel-heading text-center">
          Cadastro Fornecedor
        </div>
        <div class="panel-body">
          <form action="insere_fornecedor.php" method="POST">
            <div class="input-group">
              <input type="text" name="nome" placeholder="Nome" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="descricao" placeholder="Descrição" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="rua" placeholder="Rua" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="numero" placeholder="Número" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="complemento" placeholder="Complemento" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="bairro" placeholder="Bairro" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="cep" placeholder="Cep" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="cidade" placeholder="Cidade" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="estado" placeholder="Estado" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="telefone" placeholder="Telefone " class="form-control">
            </div>
            <br>
            <div class="input-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <br>
            <div class="text-center">
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>