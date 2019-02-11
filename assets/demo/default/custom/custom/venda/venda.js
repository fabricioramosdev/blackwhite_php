var carrinho_compras = []
var adicionar_produto = function(elem){

  $.ajax(
    {
      url: app_u +'Venda/busca_produto',
      data: {
        id: elem.value,
      },
      type: 'post',
      dataType: 'json',
      success : function (data) {

        if(data){

          let produto = data[0];

          let preco_venda = parseFloat(produto.preco_venda).toFixed(2);
          let total_item = parseFloat( produto.preco_venda*1).toFixed(2);
          produto.total_item = total_item;
          produto.quantidade_item = 1;
          carrinho_compras.push(produto);

          monta_tabela(carrinho_compras);
          $('itensCarrinho').html('');
          $('itensCarrinho').html(total_itens_venda());

          $('valorTotalVenda').html('');
          $('valorTotalVenda').html(soma_valor_itens_venda());

        }

      }
    }
  );

  elem.value = '';

}

var total_itens_venda =  function(){
  let total_itens = 0;
  total_itens = carrinho_compras.length
  return total_itens
}

var soma_valor_itens_venda =  function(){
  let soma = 0;
  for(valor in carrinho_compras){
    soma += parseFloat(carrinho_compras[valor].total_item)
  }
  return soma.toFixed(2)
}



var altera_quantidade = function(quantidade,id){

  let soma =  parseFloat($('valorTotalVenda').html());
  let table = $('#table_produtos');

  $.each(carrinho_compras, function(index,value){
    if(value.id == id){
      carrinho_compras[index].total_item =  parseFloat(carrinho_compras[index].preco_venda*quantidade).toFixed(2)
      carrinho_compras[index].quantidade_item = quantidade
      console.log(index);
      table.find(`tr:eq(${index+1})`).find("td:eq(4)").html(`R$ ${ carrinho_compras[index].total_item}`);

    }
  });

  $('valorTotalVenda').html('');
  $('valorTotalVenda').html(soma_valor_itens_venda())

}


var monta_tabela = function(carrinho_compras){

  let table = $('#table_produtos');
  $("#table_produtos tbody tr").remove();
  for(key in carrinho_compras){

    table.append(`<tr>
      <td>${carrinho_compras[key].codigo}<inpuy type="hidden" name="id" value="${carrinho_compras[key].id}"></td>
      <td>${carrinho_compras[key].descricao}</td>
      <td>
      <input type="number" name="quantidade" class="form-control" max="${carrinho_compras[key].estoque_saldo}" min="1" value="${carrinho_compras[key].quantidade_item}" onchange="altera_quantidade(this.value,${carrinho_compras[key].id})">
      </td>
      <td>R$ ${carrinho_compras[key].preco_venda}</td>
      <td>R$<valorTotalitem> ${carrinho_compras[key].total_item}</valorTotalitem></td>
      <td>
      <button type="button" class="btn btn-info btn-elevate btn-circle btn-icon" alt="Desconto"><i class="flaticon-interface-9"></i></button>
      <button type="button" class="btn btn-warning btn-elevate btn-circle btn-icon" alt="Quantidades"><i class="flaticon-cart"></i></button>
      <button type="button" class="btn btn-danger btn-elevate btn-circle btn-icon" alt="Excluir"><i class="flaticon-close"></i></button>
      </td>
      </tr>`);

    }

  }
