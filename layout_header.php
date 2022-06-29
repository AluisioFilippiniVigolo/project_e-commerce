<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/custom2.css">
  <link rel="stylesheet" href="css/custom.css" />
  <link rel="stylesheet" href="css/my_css.css" />

  <script type="text/javascript" src="js/jquery-3.6.0.js"> </script>
  <script type="text/javascript" src="js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="js/my_script.js"> </script>

</head>

<body>

<header>
  <ul class="nav justify-content-end" id="nav_superior">
    <!-- <li class="nav-item">
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
    </li> -->
    <!-- <li id="login_info">
      <?php	
      include_once "comum.php";
      
      if ( is_session_started() === FALSE ) {
        session_start();
      }	
      
      if(isset($_SESSION["nome_usuario"])) {
        // Informações de login
        echo "<span> " . $_SESSION["nome_usuario"];		
        echo "<a href='executa_logout.php'> Logout </a></span>";
      } else {
        echo "<span><a href='login.php'> Efetuar Login </a></span>";
      }
      ?>	
    </li> -->
  </ul>

  <div class="menu_principal">
    <div id="logotipo">
      <img id="img_logotipo" src="images/logotipo.png"/>	
    </div>

    <div id="busca_produtos">
      <form action="mostra_todos_produtos.php" method="GET">
        <input type="text" name="busca" id="barra_busca_produtos" placeholder="Buscar" class="form-control position_input">
        <button type="submit" id="btn_buscar">Buscar</button>
      </form>
      <li id="login_info" style="margin-left: 90%; margin-top:-34px">
      <?php	
      include_once "comum.php";
      
      if ( is_session_started() === FALSE ) {
        session_start();
      }	
      
      if(isset($_SESSION["nome_usuario"])) {
        // Informações de login
        echo "<span> " . $_SESSION["nome_usuario"];		
        echo "<a href='executa_logout.php'> Logout </a></span>";
      } else {
        echo "<span><a href='login.php'>  Login </a></span>";
      }
      ?>	
    </li>
    </div>
  </div>

</header>

