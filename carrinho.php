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
  $codigos = explode(";", $_SESSION["carrinho"]);
  if (isset($codigos) == true and count($codigos) > 0) {
    $output = '
      <table class="table table-striped table-bordered" id="lista_carrinho"> 
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
        </tr>
      ';
    $total_compra = 0;
    foreach ($codigos as $codigo) {
      if ($codigo != '') {
        $dao = $factory->getProdutoDao();
        $produto = $dao->buscaPorCodigo($codigo);
        $total_compra += $produto->getPreco();
        $output .= '
        <tr>
          <td>' . $produto->getNome() . '</td>
          <td>' . $produto->getDescricao() . '</td>
          <td>' . $produto->getPreco() . '</td>
          <td>     
            <a class="btn btn-danger">
            <span class="glyphicon glyphicon-minus"></span>
          </a> 
          </td>
        </tr>
        ';
      }
    }
    $output .= "</table>";

    echo $output;
  }

  echo "<h4>Total do pedido: R$ " . $total_compra . "</h4>";
  ?>

</section>

<?php
include_once "layout_footer.php";
?>