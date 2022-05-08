<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="libs/css/custom2.css">
	
	<!-- Latest compiled and minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
  	<!-- our custom CSS -->
  	<link rel="stylesheet" href="libs/css/custom.css" />

</head>

<body>
	<header>
		<div class="pull-left" id="logo">
		  <img src="images/Aliexpress_logo.svg"/>	
		</div>

    <div class="menu_superior">
      <form action="mostra_todos_produtos.php" method="GET">
        <input type="text" name="busca" id="barra_busca" placeholder="Buscar" class="form-control">
        <button type="submit" class="btn btn-success">Buscar</button>
      </form>
    </div>

		<div class="pull-right" id="login_info">
		<?php	
		include_once "comum.php";
		
		if ( is_session_started() === FALSE ) {
			session_start();
		}	
		
		if(isset($_SESSION["nome_usuario"])) {
			// Informações de login
			echo "<span>Você está logado como " . $_SESSION["nome_usuario"];		
			echo "<a href='executa_logout.php'> Logout </a></span>";
		} else {
			echo "<span><a href='login.php'> Efetuar Login </a></span>";
		}
		?>	
		</div>
	</header>

