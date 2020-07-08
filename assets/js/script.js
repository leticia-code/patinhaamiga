//Validação dos campos do form cadastrar ong
jQuery("#cnpj").mask("99.999.999/9999-99");

jQuery("#telefone").mask("(99) 99999-9999");

jQuery(".telefone_adote").mask("(99) 99999-9999");

//AJAX para cadastrar nova ONG
$("#cadOng").on("submit", function (event) {
  //Quando clicar no botão do form #insert_form
  event.preventDefault();
  var url = jQuery(".enderecoCadOng").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData();
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
        $("#msgCadOng").html(retorna["msg"]);
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgCadOng").html(retorna["msg"]);
      }
    },
  });
});

//AJAX para LOGIN da ONG
$("#login_ong").on("submit", function (event) {
  //Quando clicar no botão do form #insert_form
  event.preventDefault();
  var url = jQuery(".EnderecoLogin").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData();
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
        $("#msgLogin").html(retorna["msg"]);
        window.location.replace("ong/dash");
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgLogin").html(retorna["msg"]);
      }
    },
  });
});


//AJAX para LOGIN do ADM
$("#login_adm").on("submit", function (event) {
  //Quando clicar no botão do form #insert_form
  event.preventDefault();
  var url = jQuery(".EnderecoLoginAdmin").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData();
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
        $("#msgLoginAdmin").html(retorna["msg"]);
        window.location.replace("adm/dash");
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgLoginAdmin").html(retorna["msg"]);
      }
    },
  });
});

//AJAX para FORM DE DOAÇÕES
$("#doacaoOng").on("submit", function (event) {
  event.preventDefault();
  var url = jQuery(".doacaoOngEndereco").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData();
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
        $("#msgDoacaoOng").html(retorna["msg"]);

        setTimeout(function () {
          $(".modal").modal("hide");
        }, 3500); // 1000 = 1 segundo
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#msgDoacaoOng").html(retorna["msg"]);

        setTimeout(function () {
          $(".modal").modal("hide");
        }, 3500); // 1000 = 1 segundo
      }
    },
  });
});

//AJAX para EMAIL DE FIQUE POR DENTRO
$("#formNovidades").on("submit", function (event) {
  //Quando clicar no botão do form #insert_form
  event.preventDefault();
  var url = jQuery(".FiquePorDentro").attr("data-enderecocad"); //Endereço da controller
  //alert(url);
  var items = $("#" + this.id + " input").serializeArray();
  var data = new FormData();
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
        $("#MsgFiquePorDentro").html(retorna["msg"]);
      } else {
        console.log(retorna["erro"]);
        console.log("Erro");
        $("#MsgFiquePorDentro").html(retorna["msg"]);
      }
    },
  });
});



//AJAX para BUSCA PERSONALIZADA DAS ONG
$(function () {
  //VERIFICAR SE O USUARIO CLICOU NO INPUT
  $("#procura_form").keyup(function () {

    var url = jQuery(".buscaOng").attr("data-enderecocad");
    var pesqUser = $(this).val();

    if (pesqUser !== "") { //Verificando se existe valor na var pesqUser
      
      var dados = {
        palavraPesq: pesqUser
      };
      $.post(url, dados, function (retorna) {
        //Carregar o conteudo para o usuario
        $("#retornoAjaxBusca").html(retorna);
      });
    }else {
      
      $("#retornoAjaxBusca").load("ongs.php #retornoAjaxBusca"); //SE LIMPAR O INPUT ATUALIZA A DIV PARA BUSCAR TODAS AS ONGS
    }
  });
});
