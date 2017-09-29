/*! =========================================================
 * dashboard.js
 * ========================================================= */

var collapsed = '';

$( document ).ready(function() {

  $('#pg-content').scroll(function() {
    if($(this).scrollTop() >= 20) {
      $('#pg-header').css("box-shadow", "0px 10px 13px -8px rgba(0,0,0,0.75)");
    } else {
      $('#pg-header').css("box-shadow", "0px 0px 0px 0px");
    }
  });

  $('#d-content').scroll(function() {
    if($(this).scrollTop() >= 8) {
      $('#d-header').css("box-shadow", "0px 10px 13px -8px rgba(0,0,0,0.75)");
    } else {
      $('#d-header').css("box-shadow", "0px 0px 0px 0px");
    }
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip({
      trigger : 'hover',
      html : true,
    });
  });

  $("select").imagepicker({
    show_label:   true,
  });

  $('#rm-img-destaque').click(function () {
    $('#img-destaque').val('');
    $('#img-destaque-pr').attr("src", '');
  });

  $('#rm-video-destaque').click(function () {
    $('#video-destaque').val('');
  });

  bkg = function (el) {
    if($(el).parent().parent().css("background-color") == 'rgb(242, 242, 242)') {
      // $(el).parent().parent().css("transition","background-color 1s");
      $(el).parent().parent().css("background-color","white");
    } else {
      $(collapsed).css("background-color","white");
      collapsed = $(el).parent().parent();
      $(collapsed).css("background-color","#f2f2f2");
    }
  }

  function cRestantes(elemento, limite, tagert) {
    var caracteresDigitados = $(elemento).val().length;
    var caracteresRestantes = limite - caracteresDigitados;
    $(tagert).text(caracteresRestantes);
  }

  $(document).on("input", "#titulo", function () {
    cRestantes(this, 100, '.cT');
  });

  $(document).on("input", "#subtitulo", function () {
    cRestantes(this, 100, '.cS');
  });

  $(document).on("input", "#link", function () {
    cRestantes(this, 200, '.cL');
  });

  $(document).on("input", "#link_mais", function () {
    cRestantes(this, 200, '.cLM');
  });

  $(document).on("input", "#descricao", function () {
    cRestantes(this, 500, '.cD');
  });

  $(document).on("input", "#titulo_original", function () {
    cRestantes(this, 100, '.cTD');
  });

  $(document).on("input", "#elenco", function () {
    cRestantes(this, 400, '.cED');
  });

  $(document).on("input", "#direcao", function () {
    cRestantes(this, 100, '.cDD');
  });

  $(document).on("input", "#nacionalidade", function () {
    cRestantes(this, 100, '.cND');
  });

  $(document).on("input", "#genero", function () {
    cRestantes(this, 100, '.cGD');
  })

  $("#btn-rm-dia").click(function(){
    var dias = [];
    $("input[name=dia-rm]:checked").each(function(){
      dias.push($(this).attr("value"));
    // console.log($(this).attr("value"));
    });

    if(dias.length == 0) {
      swal(
        'Oops...',
        'Selecione ao menos um dia!',
        'warning');
    } else {
      swal({
        title: 'Você tem certeza?',
        text: "Essa ação não pode ser revertida!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!',
        cancelButtonText: 'Cancelar',
      },function () {
        $.ajax({
          url: 'deleta_dia.php',
          method: 'post',
          data: { array: dias},
          success: function(data) {
            if (data == 1) {
              atualizaDia();
              swal(
                'Removido!',
                'Dia(s) removido(s) com sucesso.',
                'success'
              );
            } else {
              swal(
                'Oops...',
                'Algo deu errado, alguma dia não foi removido!',
                'error'
              );
              // console.log(data);
              atualizaDia();
            }
          }
        });
      });
    }
  });

  $("#botao-copiar-dia").click(function(){
    var dias = [];
    $("input[name=dia-rm]:checked").each(function(){
      dias.push($(this).attr("value"));
    });

    if(dias.length == 0) {
      swal(
        'Oops...',
        'Selecione um dia!',
        'warning');
    } else if (dias.length > 1) {
      swal(
        'Oops...',
        'Selecione apenas um dia!',
        'warning'
      );
    } else {
      var inp = $("input[name=dia-rm]:checked");
      var date = $(inp).siblings().text();
      $('#data-copia-ref').val(date);
      $('#modal-copia-dia').modal('show');
    }
  });

  $('#btn-copia-dia').click(function (){
    event.preventDefault();

    if ($('#data-copia').val() == "") {
      swal(
        'Oops...',
        'Selecione uma data!',
        'warning'
      );
    } else {
      $('#modal-copia-dia').modal('hide');
      var dia_data = $('#data-copia').val();
      var dias = [];
      $("input[name=dia-rm]:checked").each(function(){
        dias.push($(this).attr("value"));
      });

      $.ajax({
        url: 'copia_dia.php',
        method: 'post',
        data: { d: dia_data, array: dias},
        success: function(data) {
          if (data == 1) {
            $('#data-copia').val('');
            atualizaDia();
            swal(
              'Copiado!',
              'Dia(s) copiado(s) com sucesso.',
              'success'
            );
          } else  if (data == 0){
            swal(
              'Aviso!',
              'Já existe um dia com a data selecionada!',
              'warning'
            );
          } else if (data == -1){
            // console.log(data);
            atualizaDia();
            swal(
              'Oops...',
              'Algo deu errado, alguma dia não foi copiado!',
              'error'
            );
          }
        }
      });
    }
  });

  pdremove = function (id_dia, id_programa, di_data) {
    $.ajax({
      url: 'rm_pg_dia.php',
      method: 'post',
      data: { dia: id_dia, programa: id_programa},
      success: function (data) {
        if (data != 0) {
          swal(
            'Removido!',
            'O programa foi removido do dia ' + data +'!',
            'success'
          );
          atualizaDia();
        } else {
          swal(
            'Algo deu errado...',
            'Tente novamente!',
            'error'
          );
        }
      }
    });
  }

  function classificacaoDiv() {
    if($('input:radio[name=classificacao]:checked').val() >= 10){
      $('#conteudo').css("display", "block");
    } else {
      $('#conteudo').css("display", "none");
    }
  }

  function detailDiv() {
    if($("#detalhes_filme").is(':checked')){
      $('#filme').css("display", "block");
    } else {
      $('#filme').css("display", "none");
      $('#titulo_original').val('');
      $('#elenco').val('');
      $('#direcao').val('');
      $('#nacionalidade').val('');
      $('#genero').val('');
      cRestantes("#titulo_original", 100, '.cTD');
      cRestantes("#elenco", 400, '.cED');
      cRestantes("#direcao", 100, '.cDD');
      cRestantes("#nacionalidade", 100, '.cND');
      cRestantes("#genero", 100, '.cGD');
    }
  }

  $('#botao-novo-pg').on('click', function () {
    classificacaoDiv();
    detailDiv();
    $('#cadastroPrograma').modal('show');
  });

  peditar = function (id) {

    $.ajax({
      url: 'get_pg_editar.php',
      method: 'post',
      data: { identificador: id},
      success: function(data) {
        var obj = JSON.parse(data);
        $('#id').val(obj.id);
        $('#titulo').val(obj.titulo);
        $('#subtitulo').val(obj.subtitulo);
        $('#descricao').val(obj.descricao);
        $('#horario').val(obj.hora);
        $('#img-capa').val(obj.img_capa);
        $('#img-destaque').val(obj.img_destaque);
        $('#video-destaque').val(obj.video_destaque);
        $('#img-capa-pr').attr("src", obj.img_capa);
        $('#img-destaque-pr').attr("src", obj.img_destaque);

        var s = "input:radio[value=";
        s = s + obj.classificacao;
        s = s + "]";
        $(s).prop("checked", true);

        classificacaoDiv();
        detailDiv();

        if (obj.cc == 1) {
          $("#cc").prop("checked", true);
        }

        if (obj.ad == 1) {
          $("#ad").prop("checked", true);
        }


        if (obj.ga == 1) {
          $("#ga").prop("checked", true);
        }

        if (obj.violencia == 1) {
          $("#violencia").prop("checked", true);
        }

        if (obj.sexo == 1) {
          $("#sexo").prop("checked", true);
        }

        if (obj.drogas == 1) {
          $("#drogas").prop("checked", true);
        }

        $("#link").val(obj.link);
        $("#link_mais").val(obj.link_mais);

        if (obj.filme_titulo != '' || obj.filme_elenco != '' || obj.filme_direcao != '' || obj.filme_nacionalidade != '' || obj.filme_genero != '') {
          $("#detalhes_filme").prop("checked", true);
          detailDiv();
        }

        $('#titulo_original').val(obj.filme_titulo);
        $('#elenco').val(obj.filme_elenco);
        $('#direcao').val(obj.filme_direcao);
        $('#nacionalidade').val(obj.filme_nacionalidade);
        $('#genero').val(obj.filme_genero);
        // $('#outros').val(obj.filme_outros);

        $('#modalLabel').text('Editar Programa');
        $('#cadastroPrograma').modal('show');
        cRestantes("#titulo", 100, '.cT');
        cRestantes("#subtitulo", 100, '.cS');
        cRestantes("#link", 200, '.cL');
        cRestantes("#link_mais", 200, '.cLM');
        cRestantes("#descricao", 500, '.cD');

        cRestantes("#titulo_original", 100, '.cTD');
        cRestantes("#elenco", 400, '.cED');
        cRestantes("#direcao", 100, '.cDD');
        cRestantes("#nacionalidade", 100, '.cND');
        cRestantes("#genero", 100, '.cGD');
        // cRestantes("#outros", 100, '.cOD');
      }
    });
  }

  $('#cadastroPrograma').on('hidden.bs.modal', function (e) {
    $('#modalLabel').text('Adicionar Programa');
    $('#id').val('');
    $('#titulo').val('');
    $('#subtitulo').val('');
    $('#descricao').val('');
    $('#horario').val('');
    $('#img-capa').val('');
    $('#img-destaque').val('');
    $('#video-destaque').val('');
    $('#img-capa-pr').attr("src", '');
    $('#img-destaque-pr').attr("src", '');
    $('input:radio[name=classificacao]:checked').prop("checked", false);
    $("#cc").prop("checked", false);
    $("#ad").prop("checked", false);

    $("#ga").prop("checked", false);
    $("#violencia").prop("checked", false);
    $("#sexo").prop("checked", false);
    $("#drogas").prop("checked", false);
    $('#link').val('');
    $('#link_mais').val('');
    $(".cT").text(100);
    $(".cD").text(500);
    $(".cL").text(200);
    $(".cLM").text(200);
    $(".cS").text(100);

    $("#detalhes_filme").prop("checked", false);
    $('#titulo_original').val('');
    $('#elenco').val('');
    $('#direcao').val('');
    $('#nacionalidade').val('');
    $('#genero').val('');
    // $('#outros').val('');

    $(".cTD").text(100);
    $(".cED").text(400);
    $(".cDD").text(100);
    $(".cND").text(100);
    $(".cGD").text(100);
    $(".cOD").text(100);

  });

  $('#btn-img-capa').click(function() {
    var imagem_capa = $('#slt-img-capa').val();
    if (imagem_capa == '') {
      swal(
        'Oops...',
        'Selecione uma imagem!',
        'error'
      );
    } else {
      document.getElementById('img-capa').value = imagem_capa;
      $('#img-capa-pr').attr("src", imagem_capa);
      // alert(imagem_capa);
      $('#modal-galeria-capa').modal('hide');
    }
  });

  $('#btn-img-destaque').click(function() {
    var imagem_destaque = $('#slt-img-destaque').val();
    if (imagem_destaque == '') {
      swal(
        'Oops...',
        'Selecione uma imagem!',
        'error'
      );
    } else {
      document.getElementById('img-destaque').value = imagem_destaque;
      $('#img-destaque-pr').attr("src", imagem_destaque);
      $('#modal-galeria-destaque').modal('hide');
    }
  });

  $("#form-classificacao input[name='classificacao']").change(function(){
    classificacaoDiv();
  });

  $("#detalhes_filme").change(function(){
    detailDiv();
  });

  $('#form-programa').submit(function(event){

    event.preventDefault();
    if ($('#img-capa').val() == '') {
      swal(
        'Oops...',
        'Selecione uma imagem de capa!',
        'error'
      );
    } else if ($('#img-destaque').val() == '' && $('#video-destaque').val() == '') {
      swal(
        'Oops...',
        'Selecione uma imagem ou video de destaque!',
        'error'
      );
    } else if ($('#img-destaque').val() != '' && $('#video-destaque').val() != '') {
      swal(
        'Oops...',
        'Selecione uma imagem ou video de destaque!',
        'error'
      );
    } else {
      if( $("#cc").is(':checked') ){
        var caption = 1;
      } else {
        var caption = 0;
      }

      if( $("#ad").is(':checked') ){
        var audio = 1;
      } else {
        var audio = 0;
      }

      if( $("#ga").is(':checked') ){
        var gapp = 1;
      } else {
        var gapp = 0;
      }

      if( $("#violencia").is(':checked') ){
        var v = 1;
      } else {
        var v = 0;
      }

      if( $("#sexo").is(':checked') ){
        var s = 1;
      } else {
        var s = 0;
      }

      if( $("#drogas").is(':checked') ){
        var d = 1;
      } else {
        var d = 0;
      }

      if ($('input:radio[name=classificacao]:checked').val() == 0 ||
        $('input:radio[name=classificacao]:checked').val() == -1) {
        v = 0;
        s = 0;
        d = 0;
      }

      $.ajax({
        url: 'inclui_programa.php',
        method: 'post',
        data: { id: $('#id').val(),titulo: $('#titulo').val(), subtitulo: $('#subtitulo').val(), descricao: $('#descricao').val(),
              hora: $('#horario').val(), img_capa: $('#img-capa').val(), ga: gapp, video_destaque: $('#video-destaque').val(),
              img_destaque: $('#img-destaque').val(), classificacao: $('input:radio[name=classificacao]:checked').val(),
              cc: caption, violencia: v, ad: audio,
              sexo: s, drogas: d, link: $('#link').val(), link_mais: $('#link_mais').val(),
              titulo_original: $('#titulo_original').val(), elenco: $('#elenco').val(), direcao: $('#direcao').val(),
              nacionalidade: $('#nacionalidade').val(), genero: $('#genero').val()},
        success: function(data) {
          // alert(data);
          $('#cadastroPrograma').modal('hide');
          $('#id').val('');
          $('#titulo').val('');
          $('#subtitulo').val('');
          $('#descricao').val('');
          $('#horario').val('');
          $('#img-capa').val('');
          $('#img-capa-pr').attr("src", '');
          $('#img-destaque-pr').attr("src", '');
          $('#img-destaque').val('');
          $('#video-destaque').val('');
          $('#link').val('');
          $('#link_mais').val('');
          $('input:radio[name=classificacao]:checked').prop("checked", false);
          $("#cc").prop("checked", false);
          $("#ad").prop("checked", false);

          $("#ga").prop("checked", false);
          $("#violencia").prop("checked", false);
          $("#sexo").prop("checked", false);
          $("#drogas").prop("checked", false);
          $(".cT").text(100);
          $(".cD").text(500);
          $(".cL").text(200);
          $(".cLM").text(200);
          $(".cS").text(100);

          $("#detalhes_filme").prop("checked", false);
          $('#titulo_original').val('');
          $('#elenco').val('');
          $('#direcao').val('');
          $('#nacionalidade').val('');
          $('#genero').val('');
          // $('#outros').val('');

          $(".cTD").text(100);
          $(".cED").text(400);
          $(".cDD").text(100);
          $(".cND").text(100);
          $(".cGD").text(100);
          // $(".cOD").text(100);

          // alert(data);
          atualizaPrograma();
          atualizaDia();
        }
      });
    }
  });

  var target = '';
  var collapse_count = 0;

  function atualizaPrograma(){
    $.ajax({
      url: 'get_programa.php',
      success: function(data) {
        $('#programas').html(data);
        $('[data-toggle="tooltip"]').tooltip({
          trigger : 'hover',
          html : true,
        });

        $('.stop').on("click", function(){
          if (target != '') {
            var selector = "[target-iframe=" + target + "]";
            $(selector).attr('src', $(selector).attr('src'));
            target = $(this).attr("data-iframe");
            collapse_count++;
          } else {
            target = $(this).attr("data-iframe");
            collapse_count++;
          }
        });
      }
    });
  }

  atualizaPrograma();

  function atualizaDia(id){
    $.ajax({
      url: 'get_dia.php',
      success: function(data) {
        $('#dias').html(data);
        $('[data-toggle="tooltip"]').tooltip({
          trigger : 'hover',
          html : true,
        });
      }
    });
  }

  atualizaDia();

  $(function(){
    $("[name='pg-rm']").change(function(){
      var count = $("input[name=pg-rm]:checked").length;
      var $btn = $('#botao-remover');
      $btn.prop("disabled", count == 0);
    });
  });

  $("#botao-novo-dia").click(function(){
    var count_dias = $("input[name=pg-rm]:checked").length;
    if(count_dias == 0) {
      swal(
        'Oops...',
        'Selecione ao menos um programa!',
        'warning'
      );
    } else {
      $('#modal-dia').modal('show');
    }
  });

  $('#form-dia').submit(function(event){
    event.preventDefault();
    $('#modal-dia').modal('hide');
    var programas_dia = [];
    var dias_programas = [];

    $("input[name=pg-rm]:checked").each(function(){
      programas_dia.push($(this).attr("value"));
    });

    var pg_hr_ig = [];

    for (var i = 0; i < programas_dia.length; i++) {
      var flag = false;
      for (var j = 0; j < programas_dia.length; j++) {
        if (i != j) {
          var a = h(programas_dia[i]);
          var b = h(programas_dia[j]);
          if (a == b) {
            flag = true;
          }
        }
      }

      if (flag == true) {
        pg_hr_ig.push(programas_dia[i]);
      }
    }

    function h(id) {
      var s = '*[data-id=' + id + "]";
      var z = "";

      $(s).children().each(function() {
        if($(this).prop("tagName") == 'P') {
          z = $(this).text();
        }
      });

      return z;
    }

    //programas do dia
    function v(data) {
      var s = '*[data-dia-pg=' + data + "]";
      var z = "";

      $(s).each(function() {
        $(this).children().each(function () {
          if ($(this).prop("id") == 'dia-pg') {
            dias_programas.push($(this).text());
          }
        });
      });
    }

    if (pg_hr_ig.length > 0) {
      var s = "Os programas de ID ";
      for (var i = 0; i < pg_hr_ig.length; i++) {
        if (i == pg_hr_ig.length - 1) {
          s = s + pg_hr_ig[i];
        } else s = s + pg_hr_ig[i] + ', ';
      }
      s = s + " tem conflito de horário!";

      $("input[name=pg-rm]:checked").each(function(){
        ($(this).prop("checked", false));
      });

      swal(
        'Conflito!',
        s,
        'warning'
      );
    } else {
      v($('#data').val());
      pg_hr_ig = [];

      for (var i = 0; i < programas_dia.length; i++) {
        var a = h(programas_dia[i]);
        var flag = false;

        for (var j = 0; j < dias_programas.length; j++) {
          var b = h(dias_programas[j]);
          if (a == b) {
            flag = true;
          }
        }

        if (flag == true) {
          pg_hr_ig.push(programas_dia[i]);
        }
      }

      if (pg_hr_ig.length > 0) {
        var s = "Os programas de ID ";
          for (var i = 0; i < pg_hr_ig.length; i++) {
            if (i == pg_hr_ig.length - 1) {
              s = s + pg_hr_ig[i];
            } else s = s + pg_hr_ig[i] + ', ';
          }
          s = s + " tem conflito de horário!";

          $("input[name=pg-rm]:checked").each(function(){
            ($(this).prop("checked", false));
          });

          swal(
            'Conflito!',
            s,
            'warning'
          );
        } else {
          $.ajax({
            url: 'inclui_dia.php',
            method: 'post',
            data: { dia: $('#data').val(), array_dia: programas_dia},
            success: function(data) {
              $("input[name=pg-rm]:checked").each(function(){
                ($(this).prop("checked", false));
              });
              atualizaDia(data);
              $('#data').val('');
            }
          });
        }
      }
    });

    $("#botao-copiar-programa").click(function(){
      var programas = [];
      $("input[name=pg-rm]:checked").each(function(){
        programas.push($(this).attr("value"));
      });

      if(programas.length == 0) {
        swal(
          'Oops...',
          'Selecione ao menos um programa!',
          'warning'
        );
      } else {
        $.ajax({
          url: 'copia_programa.php',
          method: 'post',
          data: { array: programas},
          success: function(data) {
            if (data != -1) {
              atualizaPrograma();
              atualizaDia();
              swal(
                'Copiado!',
                'Programa(s) copiado(s) com sucesso.',
                'success'
              );
            } else {
              console.log(data);
              atualizaPrograma();
              atualizaDia();
              swal(
                'Oops...',
                'Algo deu errado, alguma programa não foi copiado!',
                'error'
              );
            }
          }
        });
      }
    });

    $("#botao-remover").click(function(){
      var programas = [];
      $("input[name=pg-rm]:checked").each(function(){
        programas.push($(this).attr("value"));
        // console.log($(this).attr("value"));
      });

      if(programas.length == 0) {
        swal(
          'Oops...',
          'Selecione ao menos um programa!',
          'warning'
        );
      } else {
        // console.log(imagens);
        swal({
          title: 'Você tem certeza?',
          text: "Essa ação não pode ser revertida!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim, remover!',
          cancelButtonText: 'Cancelar',
        },function () {
          $.ajax({
            url: 'deleta_programa.php',
            method: 'post',
            data: { array: programas},
            success: function(data) {
              if (data == 1) {
                atualizaPrograma();
                atualizaDia();
                swal(
                  'Removido!',
                  'Programa(s) removido(s) com sucesso.',
                  'success'
                );
              } else {
                // console.log(data);
                atualizaPrograma();
                atualizaDia();
                swal(
                  'Oops...',
                  'Algo deu errado, alguma programa não foi removido!',
                  'error'
                );
              }
            }
          });
        });
      }
    });
  });
