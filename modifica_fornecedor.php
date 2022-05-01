<?php
$page_title = "Alteração de Fornecedor";

include_once "fachada.php";
include "verifica.php";

$id = @$_GET["codigo"];

$dao = $factory->getFornecedorDao();
$fornecedor = $dao->buscaPorCodigo($codigo);

// layout do cabeçalho
include_once "layout_header.php";
 ?>
 <section>
<form action="altera_fornecedor.php" method="get">
    <table class='table table-hover table-responsive table-bordered'>
         <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' value='<?php echo $fornecedor->getNome();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><input type='text' name='descricao' value='<?php echo $fornecedor->getDescricao();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Rua</td>
            <td><input type='text' name='rua' value='<?php echo $fornecedor->getRua();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Número</td>
            <td><input type='text' name='numero' value='<?php echo $fornecedor->getNumero();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Complemento</td>
            <td><input type='text' name='complemento' value='<?php echo $fornecedor->getComplemento();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Bairro</td>
            <td><input type='text' name='bairro' value='<?php echo $fornecedor->getBairro();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Cep</td>
            <td><input type='text' name='cep' value='<?php echo $fornecedor->getCep();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Cidade</td>
            <td><input type='text' name='cidade' value='<?php echo $fornecedor->getCidade();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Estado</td>
            <td><input type='text' name='estado' value='<?php echo $fornecedor->getEstado();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Telefone</td>
            <td><input type='text' name='telefone' value='<?php echo $fornecedor->getTelefone();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' value='<?php echo $fornecedor->getEmail();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <button type="submit" class="btn btn-primary">Alterar</button>
                <a href='mostra_todos_fornecedores.php' class='btn btn-primary left-margin'>Cancela</a>
            </td>
        </tr>
    </table>
    <input type='hidden' name='codigo' value='<?php echo $fornecedor->getCodigo();?>'/>
</form>
</section>
<?php
// layout do rodapé
include_once "layout_footer.php";
?>


