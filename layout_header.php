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
      <?php
      include_once "comum.php";

      if (is_session_started() === FALSE) {
        session_start();
      }

      if (isset($_SESSION["nome_usuario"])) {
        echo "<span> " . $_SESSION["nome_usuario"];
        echo "<a href='executa_logout.php'> Logout </a></span>";
      } else {
        echo "<span><a href='login.php'>  Login </a></span>";
      }

      echo "</ul>";
      echo "<div class='menu_principal'>";
      echo "<div id='logotipo'>";
      echo "<img id='img_logotipo' src='images/logotipo.png'/>";
      echo "</div>";

      if (isset($_SESSION["nome_usuario"]) == false or strcasecmp($_SESSION["nome_usuario"], "Admin") != 0) {
        echo "<div id='busca_produtos'>";
        echo "<input type='text' name='busca' id='barra_busca_produtos' placeholder='Buscar' class='form-control position_input'>";
        echo "<button type='submit' id='btn_buscar' class='btn_buscar'>Buscar</button>";
        echo "<a href='carrinho.php'><img id='img_carrinho' src='images/carrinho.png'/></a>";
        echo "</div>";
      }
      ?>
  </header>