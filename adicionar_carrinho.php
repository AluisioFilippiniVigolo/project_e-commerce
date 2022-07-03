<?php
include "verifica.php";

$page_title = "Carrinho de compras PHP";

include_once "layout_header.php";
include_once "fachada.php";

?>

<script type="text/javascript" src="js/jquery-3.6.0.js">
</script> 

<script type="text/javascript" src="js/bootstrap.min.js">
</script>

<script type="text/javascript" src="js/my_script.js">
</script>

<section>

  <?php
  if (isset($_SESSION["id_usuario"])) {
    $_SESSION["carrinho"] = $_SESSION["carrinho"] . $_GET['codigo'] . ";";
    //$_SESSION["produto"] = $_GET['quantidade'];

  }
  header("Location: index.php");
  ?>

</section>

<?php
include_once "layout_footer.php";
?>