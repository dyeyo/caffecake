$(document).ready(function () {
  $("#example").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
  $(".codReference").select2({ dropdownParent: $("#myModal") });
});
function specialCustomer() {
  var codReference = $(".codReference").val();
  if (codReference != 0) {
    $.getJSON(route("loadBuys", { id: codReference }), function (data) {
      if (data.length == 1) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 5 compras, es acreedor del 5% de descuento</div>";
      } else if (data.length == 10) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 10 compras, es acreedor del 10% de descuento</div>";
      } else if (data.length == 12) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 12 compras, es acreedor del 50% de descuento</div>";
      }
    });
  }
}
