<?php
$page_title = "Alteração de Produto";

include_once "fachada.php";
include "verifica.php";

$codigo = @$_GET["codigo"];

$dao = $factory->getProdutoDao();
$produto = $dao->buscaPorCodigo($codigo);


// layout do cabeçalho
include_once "layout_header.php";
 ?>
 <section>
<form action="altera_produto.php" method="get">
    <table class='table table-hover table-responsive table-bordered'>
         <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' value='<?php echo $produto->getNome();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><input type='text' name='descricao' value='<?php echo $produto->getDescricao();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Fornecedor</td>
            <td><input type='text' name='fornecedor' value='<?php echo $produto->getFornecedor();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Quantidade</td>
            <td><input type='text' name='quantidade' value='<?php echo $produto->getQuantidade();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input type='text' name='preco' value='<?php echo $produto->getPreco();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Imagem</td>
            <td><input type="file" id="Arquivo" name="arquivo" class="form-control" multiple /></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <button type="submit" class="btn btn-primary">Alterar</button>
                <a href='mostra_todos_produtos.php' class='btn btn-primary left-margin'>Cancela</a>
            </td>
        </tr>
    </table>
    <input type='hidden' name='codigo' value='<?php echo $produto->getCodigo();?>'/>
</form>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function (e) {
          $('#Arquivo').on('change', function () {
              var file_data = $('#Arquivo').prop('files')[0];
              //alert(file_data);
              var form_data = new FormData();
              form_data.append('Arquivo', file_data);
              $.ajax({
                  url: 'http://localhost/project_e-commerce/enviar_ajax.php', // point to server-side controller method
                  dataType: 'text', // what to expect back from the server
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data,
                  type: 'post',
                  success: function (response) {
                      $('#msg').html(response); // display success response from the server
                  },
                  error: function (response) {
                      $('#msg').html(response); // display error response from the server
                  }
              });
          });
      });
  </script>
<?php
// layout do rodapé
include_once "layout_footer.php";
?>


