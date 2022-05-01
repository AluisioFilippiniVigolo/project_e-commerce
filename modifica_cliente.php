<?php
$page_title = "Alteração de Cliente";

include_once "fachada.php";
include "verifica.php";

$id = @$_GET["codigo"];

$dao = $factory->getProdutoDao();
$produto = $dao->buscaPorCodigo($codigo);

// layout do cabeçalho
include_once "layout_header.php";
 ?>
 <section>
<form action="altera_cliente.php" method="get">
    <table class='table table-hover table-responsive table-bordered'>
         <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' value='<?php echo $cliente->getNome();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Login</td>
            <td><input type='text' name='login' value='<?php echo $cliente->getLogin();?>'class='form-control' /></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type='password' name='senha' value='<?php echo $cliente->getSenha();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Rua</td>
            <td><input type='text' name='rua' value='<?php echo $cliente->getRua();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Número</td>
            <td><input type='text' name='numero' value='<?php echo $cliente->getNumero();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Complemento</td>
            <td><input type='text' name='complemento' value='<?php echo $cliente->getComplemento();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Bairro</td>
            <td><input type='text' name='bairro' value='<?php echo $cliente->getBairro();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Cep</td>
            <td><input type='text' name='cep' value='<?php echo $cliente->getCep();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Cidade</td>
            <td><input type='text' name='cidade' value='<?php echo $cliente->getCidade();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Estado</td>
            <td><input type='text' name='estado' value='<?php echo $cliente->getEstado();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Telefone</td>
            <td><input type='text' name='telefone' value='<?php echo $cliente->getTelefone();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' value='<?php echo $cliente->getEmail();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Cartão de Crédito</td>
            <td><input type='text' name='cep' value='<?php echo $cliente->cartaoCredito();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <button type="submit" class="btn btn-primary">Alterar</button>
                <a href='mostra_todos_clientes.php' class='btn btn-primary left-margin'>Cancela</a>
            </td>
        </tr>
    </table>
    <input type='hidden' name='codigo' value='<?php echo $cliente->getCodigo();?>'/>
</form>
</section>
<?php
// layout do rodapé
include_once "layout_footer.php";
?>


