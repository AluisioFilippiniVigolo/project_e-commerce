<?php
// layout do cabeçalho

include "verifica.php";

$page_title = "Listagem de Clientes";

include_once "layout_header.php";
include_once "fachada.php";

?>

<section>

<div class="form-group">
  <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Digite aqui letras do nome para pesquisar" />
</div>
<div class="table-responsive" id="dynamic_content">
  
</div>

</br>

<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch_fornecedores.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>

</section>

<?php
// layout do rodapé
include_once "layout_footer.php";
?>

