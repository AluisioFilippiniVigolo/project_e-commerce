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

        <div class="col-md-4">
            <div class="panel panel-default panel-login">
                <div class="panel-heading text-center">
                    LOGIN
                </div>
                <div class="panel-body">
                    <form action="executa_login.php" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" name="login" placeholder="Usuário" class="form-control">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" name="senha" placeholder="Senha" class="form-control">
                        </div>
                        <br>
                        <p><a>Esqueci minha senha</a></p>
                        <p><a href="cadastro_cliente.php"> Primeiro acesso?</a></p>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">ENTRAR</button>
                        </div>
                    </form>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
</body>

</html>