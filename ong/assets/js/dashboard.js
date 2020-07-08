$(document).ready(function () {
    //Apresentar ou ocultar o menu
    $('.sidebar-toggle').on('click', function () {
        $('.sidebar').toggleClass('toggled');
    });
    
    //carregar aberto o submenu
    var active = $('.sidebar .active');
    if (active.length && active.parent('.collapse').length) {
        var parent = active.parent('.collapse');

        parent.prev('a').attr('aria-expanded', true);
        parent.addClass('show');
    }
});

//FUNÇÃO PARA PREVIEW EM LOCAIS QUE TENHA SELEÇÃO DE IMAGEM
function previewImagem() {
    var imagem = document.querySelector("input[name=imagem_nova]").files[0];
    var preview = document.querySelector("#preview-user");
  
    var reader = new FileReader();
    reader.onload = function () {
      preview.src = reader.result;
    };
    if (imagem) {
      reader.readAsDataURL(imagem);
    } else {
      preview.src = "";
    }
  }






