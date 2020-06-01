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
  $(".codReference").select2({
    allowClear: true,
    placeholder: "Seleccine una opcion..",
  });
});

function renovation_card() {
  var data = $("#ventaDoce").serialize();
  var url = route("codeRenovation");

  if ($("#ventaDoce").smkValidate()) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: function (ans) {
        if ($.isEmptyObject(ans.error)) {
          let activacion = document.getElementById("activacion");
          activacion.innerHTML =
            "<div id='decuento' class='alert alert-success'>Felicades, su tarjeta de cliente frecuente se actualizo</div>";
          setTimeout(function () {
            $("#activacion").fadeOut(1500);
          }, 3000);
        }
      },
    });
  }
}

function specialCustomer() {
  var codReference = $(".codReference").val();
  if (codReference != 0) {
    $.getJSON(route("loadBuys", { id: codReference }), function (data) {
      if (data.length == 5) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 5 compras, es acreedor del 5% de descuento</div>";
      } else if (data.length == 10) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 10 compras, es acreedor del 10% de descuento</div>";
      } else if (data.length == 12) {
        let alerta_doce = document.getElementById("alerta");
        alerta_doce.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 12 compras, es acreedor del 50% de descuento, y se le actualizara la tarjeta del cliente</div>";
        if (alerta_doce) {
          $("#formActivacion").show();
          $("#noRemovar").click(() => {
            $("#formActivacion").hide();
          });
        }
      }
    });
  }
}
