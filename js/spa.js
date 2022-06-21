function f_busca(pagina) {
    $.ajax
    ({
        //Configurações
        type: 'POST',//Método que está sendo utilizado.
        //Página a ser chamada (conteúdo a ser trazido)
        url: pagina,
        //função que será executada quando a solicitação for finalizada.
        success: function (msg)
        {
            $("#div_conteudo").html($(msg));
        }
    });
    return false;
}

function f_botao_1() {
    return f_busca('busca_tabela.php');
}

function f_botao_2() {
    return f_busca('busca_list.php');
}

function f_botao_3() {
    return f_busca('busca_check.php');
}

