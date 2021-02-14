$('#mispedidos').dataTable({
    ajax: "Carrito/pedidos",
    "searching": false,
    "bPaginate": false,
    "pagingType": "simple",
    "bInfo" : false,
    "order": [],"language": {
        "emptyTable": "No hay pedidos"
      }
});

$('#detalle').dataTable({
    ajax: "Carrito/detallepedido",
    "searching": false,
    "bPaginate": false,
    "pagingType": "simple",
    "bInfo" : false,
    "order": [],"language": {
        "emptyTable": "No hay pedidos"
      }
});

function detalle(id){
    $('#detalle').DataTable().ajax.url("Carrito/detallepedido/"+id).load();
    $('#detalle').show();
}