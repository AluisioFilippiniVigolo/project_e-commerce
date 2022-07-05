<?php
include "verifica.php";

$page_title = "Pedido";

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
  $codigos = explode(";", $_GET['codigo']);
  foreach ($codigos as $codigo) {
    if ($codigo != '') {
      $dao = $factory->getProdutoDao();
      $produto = $dao->buscaPorCodigo($codigo);
    }
  }

?>
</section>


<?php
include_once "layout_footer.php";
?>