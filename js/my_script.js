jQuery(document).ready(function($) {
  buscaProdutos($);
});

/*
function alteraTurma(id) {
  buscaTurma($, id); 
}
*/

function salvaProduto() {

  var codigo = $('#codigo').val();

  if(codigo==null || codigo == "" || codigo == undefined) {
      insereProduto(); 
  } else {
      alteraProduto();
  }
}

function insereProduto() {

  var produto = {
      codigo : $('#codigo').val(),
      nome : $('#nome').val(),
      descricao : $('#descricao').val(),
      fornecedor : $('#fornecedor').val(),
      quantidade : $('#quantidade').val(),
      preco : $('#preco').val(),
      imagem : $('#arquivo').val()
  }

  $.ajax
  ({
      type: 'POST',
      url: 'produto',
      dataType: "json",
      data : JSON.stringify(produto), 

      complete: function (msg)
      {
          $('#codigo').val("");
          $('#nome').val("");
          $('#descricao').val("");
          $('#fornecedor').val("");
          $('#quantidade').val("");
          $('#preco').val("");
          $('#arquivo').val("");
          buscaProdutos($);
      }
  });
  
  $('#produtoForm').modal('toggle');
}


function alteraProduto() {
  
  var produto = {
    codigo : $('#codigo').val(),
    nome : $('#nome').val(),
    descricao : $('#descricao').val(),
    fornecedor : $('#fornecedor').val(),
    quantidade : $('#quantidade').val(),
    preco : $('#preco').val(),
    imagem : $('#arquivo').val()
  }

  $.ajax
  ({
      //Configurações
      type: 'PUT',
      url: 'produto?codigo=' + produto.codigo,
      //url: 'produto/' + produto.codigo,
      dataType: "json",
      data : JSON.stringify(produto),

      //função que será executada quando a solicitação for finalizada.
      complete: function (msg)
      {
        $('#codigo').val("");
        $('#nome').val("");
        $('#descricao').val("");
        $('#fornecedor').val("");
        $('#quantidade').val("");
        $('#preco').val("");
        buscaProdutos($);
      }
  });
  
  $('#produtoForm').modal('toggle');
 
}

function removeProduto(codigo) {
  $.ajax
  ({
      type: 'DELETE',
      dataType: 'json',
      url: 'produto?codigo=' + codigo,
      //url: 'produto/' + codigo,
      complete: function (msg)
      {
          buscaProdutos($);
      }
  });
}

function buscaProduto(codigo) {
  $.ajax
  ({
      type: 'GET',
      url: 'produto?codigo=' + codigo,
      //url: 'produto/' + codigo,
      success: function (msg)
      {
          var produto = JSON.parse(msg);

          if(produto!=null){
              $('#codigo').val(produto.codigo);
              $('#nome').val(produto.nome);
              $('#descricao').val(produto.descricao);
              $('#fornecedor').val(produto.fornecedor);
              $('#quantidade').val(produto.quantidade);
              $('#preco').val(produto.preco);
              $('#arquivo').val(produto.imagem)
              $('#produtoForm').modal('toggle');
          } 
          
      }
  });
}

function buscaProdutos($) {
  $.ajax
  ({
      type: 'GET',
      url: 'produto?palavra=' + $('#search_box').val() + '&inicio=' + $('#page').val()  + '&quantos=' + $('#limit').val(),
      success: function (msg)
      {
          var mydata = eval(msg);
          var quantos = Object.keys(mydata).length;
          if(quantos>0) {
              var table = $.makeTableTurmas(mydata);
              $("#div_produtos").html("<h1>Produtos</h1>");
              $("#div_produtos").append(table);
          } 
      }
  });
}

$.makeTableTurmas = function (mydata) {
  var table = $('<table class="table table-striped table-advance table-hover">');
  var tblHeader = "<tbody><tr>";
  tblHeader += "<th>Código</th>";
  tblHeader += "<th>Nome</th>";
  tblHeader += "<th>Descrição</th>";
  tblHeader += "<th>Fornecedor</th>";
  tblHeader += "<th>Quantidade</th>";
  tblHeader += "<th>Preço</th>";
  tblHeader += "<th>Imagem</th>";
  tblHeader += "<th></th>";
  tblHeader += "</tr>";
  $(tblHeader).appendTo(table);
  $.each(mydata, function (index, value) {
      var TableRow = "<tr class='clickable-row'>";
      var codigo = -1;
      $.each(value, function (key, val) {
          TableRow += "<td>" + val + "</td>";
          if(key=="codigo") {
              codigo = val;
          }
      });

      // botão para remover uma turma
      TableRow += "<td>";
      TableRow += "<button class=\"btn btn-primary\" onClick=\"";
      TableRow += "buscaProduto(" + codigo + ");\">Alterar</button>";
      TableRow += "<button class=\"btn btn-danger\" onClick=\"";
      TableRow += "if(confirm('Deseja mesmo excluir o produto?')) removeProduto(";
      TableRow += codigo + ");\">Excluir</button>";
      TableRow += "</td>";

      TableRow += "</tr>";
      $(table).append(TableRow);
  });
  return ($(table));
};
