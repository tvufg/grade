/*! =========================================================
 * arquivos.js
 * ========================================================= */

$( document ).ready(function() {
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

  function atualizaArquivo(){
    $.ajax({
      url: 'get_arquivos.php',
      success: function(data) {
        $('tbody').html(data);
        $('[rel="tooltip"]').tooltip({
          trigger : 'hover',
          html : true,
        });
      }
    });
  }

  atualizaArquivo();

  removerPDF = function (path) {
    $.ajax({
      url: 'deleta_arquivo.php',
      method: 'post',
      data: { arquivo: path },
      success: function(data) {
        if (data == 1) {
          atualizaArquivo();
          swal(
            'Removido!',
            'Arquivo removido com sucesso.',
            'success'
          );
        } else {
          swal(
            'Oops...',
            'Algo deu errado, o arquivo não foi removido!',
            'error'
          );
        }
      }
    });
  }

  $('#upload-arquivo').on('click', function(){
    var form_data = new FormData();
    var ins = document.getElementById('multipleFiles').files.length;
    for (var i = 0; i < ins; i++){
      form_data.append("files[]", document.getElementById('multipleFiles').files[i]);
    }
    $.ajax({
      url: 'upload_arquivo.php',
      // dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(response) {
        if (response == 1) {
          $('#uploadModal').modal('hide');
          console.log(response);
          swal(
            'Sucesso!',
            'Arquivos enviados com sucesso!',
            'success'
          );
          // atualizaGaleria();
          $('.sweet-confirm').click(function(){
            // location.reload();
            atualizaArquivo();
          });
        } else if (response == 0) {
          swal(
            'Aviso!',
            'Selecione ao menos um arquivo!',
            'warning'
          );
        } else if (response == -1) {
          $('#uploadModal').modal('hide');
          console.log(response);
          swal(
            'Aviso!',
            'Algum arquivo não foi enviado pois sua extensão é diferente de .pdf',
            'warning'
          );
          // atualizaGaleria();
          $('.sweet-confirm').click(function(){
            // location.reload();
            atualizaArquivo();
          });
        } else if (response == -2) {
          $('#uploadModal').modal('hide');
          swal(
            'Aviso!',
            'Algum arquivo não foi enviado pois sua extensão é diferente de .pdf',
            'warning'
          );
          $('.sweet-confirm').click(function(){
            // location.reload();
            atualizaArquivo();
          });
        } else {
          swal(
            'Oops...',
            'Algo deu errado, arquivos não enviados!',
            'error'
          );
        }
      },
      error: function (response) {
        alert(response);
      }
    });
  });

  $("#botao-remover").click(function(){
    var arquivos = [];
    $("input:checked").each(function(){
      arquivos.push($(this).attr("value"));
    });
    $.ajax({
      url: 'deleta_arquivos.php',
      method: 'post',
      data: { array: arquivos},
      success: function(data) {
        if (data >= 1) {
          $('#uploadModal').modal('hide');
          swal(
            'Sucesso!',
            'Arquivos(s) removido(s) com sucesso!',
            'success'
          );
          $('.sweet-confirm').click(function(){
            atualizaArquivo();
          });
        } else if (data == -1) {
          swal(
            'Oops...!',
            'Selecione ao menos um arquivo para excluir!',
            'warning'
          );
        } else {
          swal(
            'Oops...',
            'Algo deu errado, algum arquivo não foi removido!',
            'error'
          );
        }
      }
    });
  });

  var sellectAllClick = false;

  $('#sellectAll').on('click', function(){
    if (sellectAllClick == true) {
      sellectAllClick = false;
      $("input").each(function(){
        $(this).prop("checked", false);
        // console.log($(this).attr("value"));
      });
      // var $btnDeletar = $('#botao-remover');
      // $btnDeletar.prop("disabled", true);
      // $btnDeletar.val('Remover imagem');
    } else {
      sellectAllClick = true;
      $("input").each(function(){
        $(this).prop("checked", true);
      });
      // var $btnDeletar = $('#botao-remover');
      // $btnDeletar.prop("disabled", false);
      // $btnDeletar.val('Remover imagens');
    }
  });
});
