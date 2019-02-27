var monta_tabela = function(parcelas){

  console.log(parcelas[0]);

  let table = $('#k_table_1');
  $("#k_table_1 tbody tr").remove();
parcelas.forEach(function(element) {
    table.append(`<tr>
      <td>${element.id}</td>
      <td>${element.venda}</td>
      <td>${element.parcela}</td>
      <td>${element.data_parcela}</td>
      <td>${element.valor_parcela}</td>
      <td></td>
      </tr>`);

    });


  }


var consulta_crediario_cliente  = function(elem){

    //  let id = elem.value
      let nome = $(elem).find(":selected").text();


    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "800",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr.success(`Consultando crediário cliente, ${nome} aguarde ...`, 'Crediário');



      $.ajax({
          url: app_u +'Crediario/busca_crediario',
          data: {
            id: elem.value,
          },
          type: 'post',
          dataType: 'json',
          success : function (data) {

             if(data){
                   monta_tabela(data);
             }



          }
        });




}
