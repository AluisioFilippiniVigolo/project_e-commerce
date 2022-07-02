<!DOCTYPE html>
<html>
<head>
    <title>Carrinho de compras PHP</title>
</head>    
<body>
    <h2>Carrinho PHP</h2>
    <div class="carrinho-container">
<?php

    $items = array(['$nome'=>'Curso1','imagem'=>'logotipo.png','preco'=>'200'],
        ['$nome'=>'Curso2','imagem'=>'logotipo.png','preco'=>'100'],
        ['$nome'=>'Curso3','imagem'=>'logotipo2.png','preco'=>'100']);

        foreach ($items as $key => $value) {

        }
?>
    <div class="produto">
        <img src="<?php echo $value['imagem'] ?>" />
        <a href="?adicionar= <?php echo $key ?>" >Adicionar ao Carrinho</a>

    </div><!--produto-->

    </div><!--carrinho-contaniner-->

    <?php
     if(isset($_GET['adicionar'])){
        //vamos adicionar ao carrinho
        $idProduto = (int) $_GET['adicionar'];
        if (isset($items[$idProduto])){
            if(isset($_SESSION[$idProduto]['quantidade'])){
                $_SESSION[$idProduto]['quantidade']++;
            }else{
                $_SESSION[$idProduto] = array('quantidade'=>1,'nome'=>$items[$idProduto][$nome],'preco'=>$items[$idProduto]
                ['preco']);
            }
            echo '<script>alert("O item foi adiciondo ao carrinho.");</script>';
        }else{
            die('voce nao pode adicionar um intem que não existe');
        }
     }
    ?>

</body>
</html>

