<?php
// layout do cabeçalho

include "verifica.php";

$page_title = "Listagem de Produtos";

include_once "layout_header.php";
include_once "fachada.php";


?>

<script type="text/javascript" src="js/my_script.js">
</script>

<script type="text/javascript" src="js/jquery-3.6.0.js">
</script>

<script type="text/javascript" src="js/bootstrap.min.js">
</script>

<section>


  <div class="table-responsive" id="div_produtos"></div>

  </br>

  <div class="text-center quadro">
    <a id="botaoNovoProduto" href="#produtoForm" class="btn btn-default btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#produtoForm">Novo produto</a>
  </div>

</section>

<div class="modal fade" id="produtoForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Produtos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="codigo">Código</label>
          <input type="text" id="codigo" class="form-control validate">
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="nome">Nome</label>
          <input type="text" id="nome" class="form-control validate">
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="descricao">Descricao</label>
          <input type="text" id="descricao" class="form-control validate">
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="fornecedor">Fornecedor</label>
          <input type="text" id="fornecedor" class="form-control validate">
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="quantidade">Quantidade</label>
          <input type="text" id="quantidade" class="form-control validate">
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="preco">Preço</label>
          <input type="text" id="preco" class="form-control validate">
        </div>
      
        <div class="md-form mb-5">
          <div id="caminho"></div>
          <br>
          <input type="file" id="arquivo" name="arquivo" class="form-control" multiple />
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary btn_salvar_produto" onClick="salvaProduto();">Salvar</button>
      </div>
    </div>
  </div>
</div>

<div id="dynamic_content">

</div>

<script type="text/javascript">
  $(document).ready(function(e) {
    $('#arquivo').on('change', function() {
      var file_data = $('#arquivo').prop('files')[0];
      var form_data = new FormData();
      form_data.append('arquivo', file_data);
      $.ajax({
        url: 'http://localhost/project_e-commerce/enviar_ajax.php',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {
          $('#caminho').html(response);
        },
        error: function(response) {
          $('#caminho').html(response);
        }
      });
    });
  });

  // $(document).ready(function() {

  //   load_data(1);

  //   function load_data(page, query = '') {
  //     $.ajax({
  //       url: "fetch_produtos.php",
  //       method: "POST",
  //        data: {
  //          page: page,
  //        query: query
  //     },
  //     success: function(data) {
  //       $('#dynamic_content').html(data);
  //     }
  //   });
  //  }

  $(document).on('click', '.page-link', function() {
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
    load_data(page, query);
  });

  $('#search_box').keyup(function() {
    var query = $('#search_box').val();
    load_data(1, query);
  });

  $(document).on('click', '#btn_salvar_produto', function() {
    buscaProdutos($);
  });

</script>

<?php
// layout do rodapé
include_once "layout_footer.php";
?>