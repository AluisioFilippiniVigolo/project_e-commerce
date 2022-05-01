<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
                    <form action="autentica.php" method="POST">
                        <div class="input-group">
                            <input type="text" name="fornecedor" placeholder="Fornecedor" class="form-control">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="descrição" placeholder="Descrição" class="form-control">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="email" placeholder="Email " class="form-control">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="telefone" placeholder="Telefone " class="form-control">
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