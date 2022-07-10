<?php
include "verifica.php";

$page_title = "Carrinho de compras PHP";

include_once "layout_header.php";
include_once "fachada.php";
?>

<script type="text/javascript" src="js/jquery-3.6.0.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/my_script.js"></script>

<section  id="carrinho"></section>

<script>
  $(document).ready(function() {

        load_data();

        function load_data() {
          $.ajax({
            url: "fetch_carrinho.php",
            method: "POST",
            success: function(data) {
              $('#carrinho').html(data);
            }
          });
        }
      });
</script>

<?php
include_once "layout_footer.php";
?>