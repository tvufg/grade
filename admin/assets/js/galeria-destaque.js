/*! =========================================================
 * galeria-destaque.js
 * ========================================================= */

$(document).ready(function(){

  var sidebarMini = true;

  $('#minimizeSidebar').click(function() {
    if (sidebarMini == true) {
      $(".navbar-fixed-top").removeClass('navbar-fixed-top-mini');
      $(".navbar-fixed-top").addClass('navbar-fixed-top-large');
      sidebarMini = false;
    } else {
      $(".navbar-fixed-top").removeClass('navbar-fixed-top-large');
      $(".navbar-fixed-top").addClass('navbar-fixed-top-mini');
      sidebarMini = true;
    }
  });

  var sellectAllClick = false;

  $('#sellectAll').on('click', function(){
    if (sellectAllClick == true) {
      sellectAllClick = false;
      $("input").each(function(){
        $(this).prop("checked", false);
        // console.log($(this).attr("value"));
      });
      var $btnDeletar = $('#botao-remover');
      $btnDeletar.prop("disabled", true);
      $btnDeletar.val('Remover imagem');
    } else {
      sellectAllClick = true;
      $("input").each(function(){
        $(this).prop("checked", true);
      });
      var $btnDeletar = $('#botao-remover');
      $btnDeletar.prop("disabled", false);
      $btnDeletar.val('Remover imagens');
    }
  });

  $('#upload').on('click', function(){
    var form_data = new FormData();
    var ins = document.getElementById('multipleFiles').files.length;

    for (var i = 0; i < ins; i++){
      form_data.append("files[]", document.getElementById('multipleFiles').files[i]);
    }

    $.ajax({
      url: 'upload_imagem_destaque.php',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(response) {
        if (response == 1) {
          $('#uploadModal').modal('hide');
          // console.log(response);
          swal(
            'Sucesso!',
            'Imagens enviadas com sucesso!',
            'success'
          );
          $('.sweet-confirm').click(function(){
            location.reload();
          });
        } else if (response == 0) {
          swal(
            'Aviso!',
            'Selecione ao menos uma imagem!',
            'warning'
          );
        } else if (response == -1) {
          $('#uploadModal').modal('hide');
          // console.log(response);
          swal(
            'Aviso!',
            'Alguma imagem não foi enviada pois sua extensão é diferente de .jpg',
            'warning'
          );

          $('.sweet-confirm').click(function(){
            location.reload();
          });
        } else if (response == -2) {
          $('#uploadModal').modal('hide');
          swal(
            'Aviso!',
            'Algumas imagens não foram enviadas pois possuem extensão diferente de .jpg',
            'warning'
          );

          $('.sweet-confirm').click(function(){
            location.reload();
          });
        } else {
          swal(
            'Oops...',
            'Algo deu errado, imagens nao enviadas!',
            'error'
          );
        }
      },
      error: function (response) {
        alert(response);
      }
    });
  });

  // Função que monitora a mudança dos inputs para validação de remoção de
  // imagens
  $(function(){
    $("[name='check-remove']").change(function(){
      var countSelected = $("input[name=check-remove]:checked").length;
      var $btnDeletar = $('#botao-remover');
      $btnDeletar.prop("disabled", countSelected == 0);
      if(countSelected > 1) {
        $btnDeletar.val('Remover imagens');
      } else {
        $btnDeletar.val('Remover imagem');
      }
    });
  });

  // Captura o click no btn-remover e realiza as funções de validação e
  // remoção
  $("#botao-remover").click(function(){
    var imagens = [];
    $("input:checked").each(function(){
      imagens.push($(this).attr("value"));
    });

    $.ajax({
      url: 'deleta_imagem.php',
      method: 'post',
      data: { array: imagens},
      success: function(data) {
        if (data >= 1) {
          $('#uploadModal').modal('hide');

          swal(
          'Sucesso!',
          'Imagens removidas com sucesso!',
          'success'
          );

          $('.sweet-confirm').click(function(){
            location.reload();
          });

        } else {
            swal(
              'Oops...',
              'Algo deu errado, alguma imagem nao foi removida!',
              'error'
            );
        }
      }
    });
  });

  // Efeitos, não utilizados, de imagem
  // $("figure").hover(function(){
  // 	$(this).css("filter", "gray");
  // 	$(this).css("-webkit-filter", "grayscale(1)");
  // 	$(this).css("filter", "grayscale(1)");
  // }, function(){
  // 	$(this).css("filter", "none");
  // 	$(this).css("-webkit-filter", "grayscale(0)");
  // 	$(this).css("filter", "grayscale(0)");
  // });

  // Inicialização do tooltip
  $(function () {
    $('[data-tg="tooltip"]').tooltip({
      trigger : 'hover',
      html : true,
    });
  });
});
