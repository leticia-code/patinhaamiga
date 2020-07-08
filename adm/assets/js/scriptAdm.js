
//Carregar modal define para SAIR
$(document).ready(function () {
    $("a[data-confirm-sair]").click(function (ev) {
      var href = $(this).attr("href");
      if (!$("#confirm-delete").length) {
        $("body").append(
          '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">DESLOGAR<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja sair do sistema?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Sair</a></div></div></div></div>'
        );
      }
      $("#dataComfirmOK").attr("href", href);
      $("#confirm-delete").modal({ show: true });
      return false;
    });
  });

  //Carregar modal define para apagar
$(document).ready(function () {
  $("a[data-confirm]").click(function (ev) {
    var href = $(this).attr("href");
    if (!$("#confirm-delete").length) {
      $("body").append(
        '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado, todos os pets, doações e adoções relacionadas a esta ONG também será deletada...Deseja continuar?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>'
      );
    }
    $("#dataComfirmOK").attr("href", href);
    $("#confirm-delete").modal({ show: true });
    return false;
  });
});


//AJAX para EDITAR index ADM
$("#editaPerfilAdm").on("submit", function (event) {
  //Quando clicar no botão do form #insert_form
  event.preventDefault();
  var url = jQuery(".EditarPerfilAdm").attr("data-enderecocad"); //Endereço da controller
  //alert(url);

  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData(document.getElementById("editaPerfilAdm"));
  for (item in items) {
    data.append(items[item]["name"], items[item]["value"]);
  }
  //alert(url);
  $.ajax({
    type: "POST",
    dataType: "json",
    url: url,
    data: data,
    contentType: false,
    processData: false,
    success: function (retorna) {
      if (retorna["success"]) {
        console.log("Sucesso");
        $("#msgEditaPerfilAdm").html(retorna["msg"]);
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgEditaPerfilAdm").html(retorna["msg"]);
      }
    },
  });
});

