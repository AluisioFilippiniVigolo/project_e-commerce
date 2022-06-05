<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	
  <link rel="stylesheet" type="text/css" href="libs/css/custom2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="libs/css/custom.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  
</head>

<body>

<header>
  <ul class="nav justify-content-end" id="nav_superior">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled">Disabled</a>
    </li>
    <li id="login_info">
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
    </li>
  </ul>

  <div class="menu_principal">
    <div id="logotipo">
      <img id="img_logotipo" src="images/logotipo.png"/>	
    </div>

    <div id="busca_produtos">
      <form action="mostra_todos_produtos.php" method="GET">
        <input type="text" name="busca" id="barra_busca_produtos" placeholder="Buscar" class="form-control">
        <button type="submit" id="btn_buscar">Buscar</button>
      </form>
    </div>
  </div>

</header>

