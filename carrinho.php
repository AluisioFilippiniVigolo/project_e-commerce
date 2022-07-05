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
  if ($_SESSION["carrinho"] != '') {
    echo "<h3>Meu carrinho</h3>";
    $codigos = explode(";", $_SESSION["carrinho"]);
    $output = '
      <table class="table table-striped table-bordered" id="lista_carrinho"> 
        <tr>
          <th>Nome</th>
          <th>Descrição</th> 
          <th>Preço</th>
          <th>Excluir</th>
        </tr>
      ';
    $total_compra = 0;
    $link_codigos = '';
    foreach ($codigos as $codigo) {
      if ($codigo != '') {
        $dao = $factory->getProdutoDao();
        $produto = $dao->buscaPorCodigo($codigo);
        $total_compra += $produto->getPreco();
        $link_codigos = $link_codigos . $produto->getCodigo() . ";";
        $output .= '
        <tr>
          <td>' . $produto->getNome() . '</td>
          <td>' . $produto->getDescricao() . '</td>
          <td>' . $produto->getPreco() . '</td>
          <td>     
            <a href="remove_item_carrinho.php?codigo=' . $produto->getCodigo() . '" class="btn btn-danger">
            <span class="glyphicon glyphicon-minus"></span>
            </a>
          </td>
        </tr>
        ';
      }
    }
    $output .= 'Total do pedido: R$ ' . $total_compra . '</table>';

    echo $output;
    echo "<a type='submit' id='btn_pedido' href='pedido.php?codigo=" . $link_codigos . "' class='btn btn-success glyphicon glyphicon-shopping-cart'> Comprar</a>";
  } else {
    echo "<h3>Seu carrinho está vazio :(</h3>";
  }

  ?>

</section>


<?php
include_once "layout_footer.php";
?>