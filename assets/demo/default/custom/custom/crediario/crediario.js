
var plus = function(venda){

  var e = jQuery(`<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Detalhes venda</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
     <table class="table table-striped- table-bordered table-hover" id="table_produtos">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome Produto</th>
            <th>Quantidade</th>
            <th>Valor Unitário</th>
            <th>Valor Total</th>
          </tr>
        </thead>
        <tbody>


        </tbody>
      </table>

     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
     </div>
   </div>
 </div>
</div>`);

if (venda != '') {

  //===============================================
      $.ajax(
        {
          url: app_u +'Crediario/plus_itens_venda_crediario',
          data: {
            id: venda
          },
          type: 'post',
          dataType: 'json',
          success: function (data) {

            if(data){
            let table = $('#table_produtos');
            e.find("#table_produtos tbody tr").remove();
              for(key in data){
            e.find('#table_produtos tbody').append(`  <tr>
                <td>${data[key].produto_codigo}</td>
                <td>${data[key].produto_descricao}</td>
                <td>${data[key].produto_quantidade}</td>
                <td>R$ ${data[key].produto_preco_venda }</td>
                 <td>R$ ${(data[key].produto_quantidade*data[key].produto_preco_venda).toFixed(2)}</td>
              </tr>`);
            }

            e.modal('toggle');
            }
          }
        }
      );
//===============================================


}



}

var pagar_parcela =  function(parcela){

  swal({
      title: 'Você tem certeza?',
      text: "Você confirma o pagamento da parcela!",
      type: 'success',
      showCancelButton: true,
      confirmButtonText: 'Sim, confirmo!',
      cancelButtonText: 'Não, cancelar!',
      reverseButtons: true
  }).then(function(result){
      if (result.value) {


            //===============================================
            $.ajax(
              {
                url: app_u +'Crediario/pagar_parcela_crediario',
                data: {
                  id: parcela
                },
                type: 'post',
                dataType: 'json',
                success: function (data) {
                  if(data){
                    location.reload();
                  }
                }
              }
            );
          //===============================================
      } else if (result.dismiss === 'cancel') {
          swal(
              'Cancelado',
              'Seu registro  está seguro :)',
              'error'
          )
      }
  });



}
