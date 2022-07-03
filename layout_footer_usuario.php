<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title; ?></title>

	<link rel="stylesheet" type="text/css" href="css/custom2.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css" />

</head>

<aside>
		<h2>Categorias</h2>
		<ul class="nav flex-column">
		<?php

		include_once "comum.php";
		
		if ( is_session_started() === FALSE ) {
			session_start();
		}	
		
        // Menu de navegação : mostra sempre

    echo "<li class='nav-item'>";
		echo "<li><a href='index.php'>Home</a></li>";
    echo "</li>";

		if(isset($_SESSION["nome_usuario"])) {
			// Menu de navegação : só mostra se logado

      echo "<li class='nav-item'>";
      echo "<a href='#'>Moda Feminina</a>";
      echo "</li>";

      echo "<li class='nav-item'>";
      echo "<a href='#'>Moda Masculina</a>";
      echo "</li>";

      echo "<li class='nav-item'>";
      echo "<a href='#'>Telefonia e Comunicação</a>";
      echo "</li>";

      echo "<li class='nav-item'>"; 
      echo "<a href='#'>Computadores, Escritório e Segurança</a>";
      echo "</li>";

      echo "<li class='nav-item'>";
      echo "<a href='#'>Eletrônicos</a>";
      echo "</li>";

      echo "<li class='nav-item'>";
      echo "<a href='#'>Jóias e Relógios</a>";
      echo "</li>";
      
    } 
    ?>
		</ul>
	</aside>

</body>

<footer>
		<p id="mensagem_rodape">Proteção de Propriedade Intelectual - Política de Privacidade - Mapa do Site - Condições de Uso - Guia de Informações Jurídicas para o Usuário ©️ 2010-2022 AliExpress.com. Todos os direitos reservados.</p>
	</footer>

</html>