$(document).ready(function () {
  $(".example").DataTable({
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
    placeholder: "Seleccione una opcion..",
  });
  $("#mensajeCodigo").hover(
    function () {
      $(this).append(
        $(`<div id="mensajeCodigo">
      <span>Este es Tu código del programa, ¡tu identificación! y debe ser
          presentado siempre que desees hacer un descuento efectivo. Ya seas por
          compras acumuladas en tarjeta cliente fiel o porque un amigo que referiste hizo
          una compra.
      </span>
    </div>`)
      );
    },
    function () {
      $(this).find("#mensajeCodigo").last().remove();
    }
  );
});

function countReferences() {
  let data = $("#searchCode").serialize();
  let url = route("referideDiscount");
  let code = $("#codeReferide").val();
  $("#userReferide").val(code);

  if ($("#searchCode").submit()) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: function (data) {
        console.log(data);
        if (data.length > 0) {
          let count = data.length * 5;
          $("#totalReferides").append(
            `<div class='alert alert-success alert-dismissable'>
              <span>El cliente tiene ${data.length} referidos, para un total de ${count}% de descuento</span>
            </div>`
          );
          $("#btnsearchCode").hide();
          $("#formPagar").show();
          setTimeout(function () {
            $("#totalReferides").fadeOut(1500);
          }, 3000);
        }
      },
    });
  }
}

function renovationCard() {
  var data = $("#searchCode").serialize();
  var url = route("referideDiscount");
  if ($("#searchCode").submit()) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      beforeSend: function () {
        $("#searchCode")[0].reset();
      },
      success: function (data) {
        console.log(data);
        if (data.length > 0) {
          let count = data.length * 5;
          $("#totalReferides").append(
            `<div class='alert alert-success alert-dismissable'>
              <span>El cliente tiene ${data.length} referidos, para un total de ${count}% de descuento</span>
            </div>`
          );
          setTimeout(function () {
            $("#totalReferides").fadeOut(1500);
          }, 3000);
        }
      },
    });
  }
}

function searchCode() {
  var data = $("#searchCode").serialize();
  var url = route("referideDiscount");
  if ($("#searchCode").smkValidate()) {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: function (data) {
        console.log(data);

        if ($.isEmptyObject(data.error)) {
          let alerta = document.getElementById("totalReferides");
          alerta.innerHTML =
            "<div id='decuento' class='alert alert-success'>Felicades, su tarjeta de cliente frecuente se actualizo</div>";
          setTimeout(function () {
            $("#totalReferides").fadeOut(1500);
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
      if (data.length == 4) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 5 compras, es acreedor del 5% de descuento</div>";
      } else if (data.length == 9) {
        let alerta = document.getElementById("alerta");
        alerta.innerHTML =
          "<div id='decuento' class='alert alert-success'>Felicades, lleva 10 compras, es acreedor del 10% de descuento</div>";
      } else if (data.length == 1) {
        let idUser = $(".codReference").val();
        $("#userIdTarjet").val(idUser);
        let alerta_doce = document.getElementById("alerta");
        alerta_doce.innerHTML = `<div id='decuento' class='alert alert-success'>Felicades, lleva 12 compras, es acreedor del 50% de descuento, y se le actualizara la tarjeta del cliente</div>`;
        $("#activacion").show();
      }
    });
  }
}

function createResponseSurvey() {
  var data = $("#responseSurveys").serialize();
  console.log(data);
  var url = route("responseSurveys");
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: function (data) {
      $(this).closest("tr").remove();
      $("#response").html("");
      $("#response").append(
        `<div class="alert alert-success">
        <span>Encuesta enviada con exito, gracias por responder</span>
        </div>`
      );
      setTimeout(function () {
        $("#response").fadeOut(1500);
      }, 3000);
    },
  });
}
