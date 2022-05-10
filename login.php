<!DOCTYPE html>
<html lang="pt-br">


<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/my_css.css">
</head>

<body>
    <div class="container" >
        <div class="col-md-4">
            <div class="row">
                <div style="margin-left:87%; margin-top:165px">
                    <div class="container-form">
                    
                        <img style= "margin-left:85px"src="images/Aliexpress_logo.svg"/>
                        <form  class="form-horizontal" action="executa_login.php" method="POST">
                       
                            <input type="text" name="login" placeholder="Usuário" class="form-control i-input" autocomplete="off">
                            <br>
                            <input type="password" name="senha" placeholder="Senha" class="form-control i-input" autocomplete="off">
                            <br>
                            <div class="text-center">
                                <button class="button_orange" style="width: 100%; border-radius: 10px" type="submit" class="btn btn-success"><b>Iniciar sessão</b></button>
                            </div>
                        </form>
                        
                        </br>
                        <span>Não possui conta?</span> &nbsp;<a href="cadastro_cliente.php">Cadastre-se</a>

                    </div>
                
                </div>      
            </div>
        </div>  
        
    </div>

    <!-- <div class="container">
        
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
            </div>

        </div>
    </div> -->
</body>

</html>