//Validação dos campos do form editar perfil
jQuery("#cnpj").mask("99.999.999/9999-99");

jQuery("#telefone").mask("(99) 99999-9999");

jQuery("#cep").mask("99999-999");

jQuery("#agencia").mask("999999-99");

//AJAX para UPDATE do form de editar perfil ONG

//AJAX para EDITAR perfil ONG
$("#editaPerfilOng").on("submit", function (event) {
  //Quando clicar no botão do form #insert_form
  event.preventDefault();
  var url = jQuery(".EnderecoEditaPerfil").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData(document.getElementById("editaPerfilOng")); //PASSANDO PARAMETRO PARA ENTENDER QUE EXISTE UM INPUT TYPE FILE
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
        $("#msgEditaPerfil").html(retorna["msg"]);
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgEditaPerfil").html(retorna["msg"]);
      }
    },
  });
});

//AJAX para CADASTRAR novo PET
$("#cadPet").on("submit", function (event) {
  //Quando clicar no botão do form #insert_form
  event.preventDefault();
  var url = jQuery(".enderecoCadPet").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData(document.getElementById("cadPet")); //PASSANDO PARAMETRO PARA ENTENDER QUE EXISTE UM INPUT TYPE FILE
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
        $("#msgCadPet").html(retorna["msg"]);

        window.setTimeout("location.href='pets'", 2000);
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgCadPet").html(retorna["msg"]);

        window.setTimeout("location.href='pets'", 2000);
      }
    },
  });
});

//AJAX para EDITAR PET
$("#editaPerfilPet").on("submit", function (event) {
  event.preventDefault();
  var url = jQuery(".EnderecoEditaPerfilPet").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData(document.getElementById("editaPerfilPet")); //PASSANDO PARAMETRO PARA ENTENDER QUE EXISTE UM INPUT TYPE FILE
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
        $("#msgEditaPerfilPet").html(retorna["msg"]);
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgEditaPerfilPet").html(retorna["msg"]);
      }
    },
  });
});


//Carregar modal define para apagar
$(document).ready(function () {
  $("a[data-confirm]").click(function (ev) {
    var href = $(this).attr("href");
    if (!$("#confirm-delete").length) {
      $("body").append(
        '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>'
      );
    }
    $("#dataComfirmOK").attr("href", href);
    $("#confirm-delete").modal({ show: true });
    return false;
  });
});


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
