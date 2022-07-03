<?php
// layout do cabeçalho

$page_title = "Produtos";

include_once "layout_header.php";
include_once "fachada.php";

if(isset($_GET["busca"])) {
  $busca = $_GET["busca"];
}
else {
  $busca = ' ';
}
?>

<section>

<div class="table-responsive" id="dynamic_content">
  
</div>

</br>

<script>

  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch_produtos.php",
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
      var query = $('#barra_busca_produtos').val();
      load_data(page, query);
    });

    $(document).on('click', '.btn_buscar', function(){
    //$('#barra_busca_produtos').keyup(function(){
      var query = $('#barra_busca_produtos').val();
      load_data(1, query);
    });

  });
</script>

</section>

<?php
// layout do rodapé
include_once "layout_footer.php";
?>

