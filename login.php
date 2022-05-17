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
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
        <div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="executa_login.php" method="POST">
					
					<span class="login100-form-title p-b-48">
                        <img style="margin-left:5%; width: 85%"src="images/Aliexpress_logo.svg"/>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input type="text" name="login" placeholder="Usuário">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input type="password" name="senha" placeholder="Senha">
					</div>

					<div class="text-center">
                         <button class="button_orange" style="width: 100%; border-radius: 10px" type="submit" class="btn btn-success"><b>Iniciar sessão</b></button>
                    </div>
                </form>
                </br>
                <span>Não possui conta?</span> &nbsp;<a href="cadastro_cliente.php">Cadastre-se</a>

            </div>
        </div>




    
</body>

</html>