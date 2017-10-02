/*! =========================================================
 * programacao.js
 * ========================================================= */

$( document ).ready(function() {

  // Inicializa o tooltip
  $('[data-toggle="tooltip"]').tooltip({
    trigger : 'hover',
    html : true,
  });

  // Variáveis globais
  var collapsed = '';
  var target = '';
  var collapse_count = 0;
  var scroll;
  var pastCollapsed;

  // Define o tamanho minimo de scroll, para o programa ao vivo, de acordo com
  // o tamanho do display
  if($(document).width() < 992) {
    scroll = 135;
  } else {
    scroll = 235;
  }

  // Obtém a data/hora atual
  var data = new Date();

  // Exemplo de instrução para "pegar" a próxima data
  // data.setDate(data.getDate() + 1);

  // Guarda cada pedaço em uma variável
  var dia     = data.getDate();           // 1-31
  var dia_sem = data.getDay();            // 0-6 (zero=domingo)
  var mes     = data.getMonth();          // 0-11 (zero=janeiro)
  var ano2    = data.getYear();           // 2 dígitos
  var ano4    = data.getFullYear();       // 4 dígitos
  var hora    = data.getHours();          // 0-23
  var min     = data.getMinutes();        // 0-59
  var seg     = data.getSeconds();        // 0-59
  var mseg    = data.getMilliseconds();   // 0-999
  var tz      = data.getTimezoneOffset(); // em minutos

  var dias = new Array(
    'DOMINGO','SEGUNDA','TERÇA','QUARTA','QUINTA','SEXTA','SÁBADO'
  );

  var meses = new Array(
    'JANEIRO','FEVEREITO','MARÇO','ABRIL','MAIO','JUNHO','JULHO', 'AGOSTO',
    'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO'
  );

  // Formata a data e a hora (note o mês + 1)
  // var str_data = dia + '/' + (mes+1) + '/' + ano4;
  // var str_hora = hora + ':' + min + ':' + seg;
  var d_s = dias[dia_sem].substring(0,3);
  var str_data = d_s + ', ' + dia + ' DE ' + meses[mes];

  $('#data').text(str_data);



  // Função que busca no banco a grade de programação
  function getGrade(queryData) {

    $('.panel-group').empty();

    arquivoPath = 'http://www.tvufg.org.br/grade/pdf/' + queryData + '.pdf';
    // clientName = 'grade-tv-ufg-' + queryData + '.pdf';

    $('#download-grade').attr("href", arquivoPath);
    // $('#download-grade').attr("download", clientName);

    $.ajax({
      url: 'get_grade.php',
      type: "POST",
      data: { getDia: queryData },
      beforeSend: function () {
        $('html, body').animate({
          scrollTop: $('.wrapper').offset().top - 160
        }, 200, function(){

        });
        $('.panel-group').html('<img style="with: 200px; height: 123.5px; margin-left: calc(50% - 100px); margin-top: 10%;" src="../imagens/loading_tv_ufg.gif"/>');
      },
      success: function(resp) {

        setTimeout(function(){

          if (resp != "") {
            $('.panel-group').html(resp);

            // Devido a pagina ter sido gerada "dinamicamente" é necessário
            // reinicializar os tooltips
            $('[data-toggle="tooltip"]').tooltip({
              trigger : 'hover',
              html : true,
            });

            // Evento que controla a exibição "collapse" da grade/programa
            $(".collapse-programa").on('click', function() {
              if(pastCollapsed != $(this).closest('.collapse-programa').attr('href')) {
                $(pastCollapsed).collapse('hide');
                  pastCollapsed = $(this).closest('.collapse-programa').attr('href');
                }

              if($(this).closest('.panel-default').css("background-color") == 'rgb(242, 242, 242)') {
                $(this).closest('.panel-default').css("background-color","#f9f9f9");
              } else {
                $($(this).closest('.panel-default')).on('show.bs.collapse', function () {
                  $(collapsed).css("background-color","#f9f9f9");
                  collapsed = $(this).closest('.panel-default');
                  $(collapsed).css("background-color","#f2f2f2");
                })
              }
            });

            // Evento responsável por parar a exibição do video quando o
            // collapse do mesmo é ocultado
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

            // Função que compara duas horas, informadas no formato string
            function compararHora(hora1, hora2) {
              hora1 = hora1.split(":");
              hora2 = hora2.split(":");

              var d = new Date();
              var data1 = new Date(d.getFullYear(), d.getMonth(), d.getDate(), hora1[0], hora1[1]);
              var data2 = new Date(d.getFullYear(), d.getMonth(), d.getDate(), hora2[0], hora2[1]);

              return data1 > data2;
            };

            var horas = [];

            // Função que identifica e personaliza a exibição do programa que
            // está no ar
            function noAR() {

              $.each( $( ".time" ), function() {
                horas.push( $(this).text() );
              });

              hora    = data.getHours();
              min     = data.getMinutes();

              var stringHoraPC = hora + ":" + min;
              var stringHoraPG;

              if (compararHora(horas[0], stringHoraPC) == true) {
                return horas.length - 1;
              }

              for (i = 1; i < horas.length; i++) {
                stringHoraPG = horas[i];

                if (compararHora(stringHoraPG, stringHoraPC) == true) {
                  return i - 1;
                }
              }

              if (i == horas.length) {
                return i - 1;
              }
            }

            // Chamada da função noAR onde o dia e a hora do PC do usuário são
            // identificados e utilizados para difinir a exibição do programa
            // que está no ar
            if(stringDataAtual == queryData) {
              var retorno = noAR();

              if (retorno >= 0) {
                var noARPG = horas[retorno];
                $.each( $( ".time" ), function() {
                  if ($(this).text() ==  noARPG) {
                    pastCollapsed = $(this).closest('.collapse-programa').attr('href');
                    target = $(this).closest('.collapse-programa').attr('data-iframe');
                    collapsed = $(this).closest('.panel-default');
                    $(collapsed).css("background-color","#f2f2f2");
                    $(this).replaceWith('<span class="no-ar">NO AR</span>');
                    $(pastCollapsed).collapse('show');
                    collapse_count++;
                  }
                });

                setTimeout(function(){
                  $('html, body').animate({
                    scrollTop: $(pastCollapsed).offset().top - scroll
                  }, 1500, function(){});
                }, 350);
              }
            }

          } else {
            $('.panel-group').html('<div style="margin-top: 20%;"> <h2 style="text-align: center; font-family: opensans-light,Arial,sans-serif !important; font-weight: 700;">Não há itens para exibição</h2> </div>');
          }
        }, 1200);
      }
    });
  }

  if (dia < 10) {
    dia = "0" + dia;
  }

  if (mes >= 9) {
    mes = "" + (mes + 1);
  } else {
    mes = "0" + (mes + 1);
  }

  // Montagem da string de consulta da data
  var queryData = ano4 + mes + dia;
  var stringDataAtual = ano4 + mes + dia;

  // var firstDate = "";
  // var lastDate = "";
  //
  // $.ajax({
  //   url: 'datas_limite.php',
  //   type: "POST",
  //   success: function(resp) {
  //     var datas_limite = resp.split("/");
  //     var stringFirstDate = datas_limite[0].split("-");
  //     var stringLastDate = datas_limite[1].split("-");
  //
  //     firstDate = stringFirstDate[0] + stringFirstDate[1] + stringFirstDate[2];
  //     lastDate = stringLastDate[0] + stringLastDate[1] + stringLastDate[2];
  //
  //    }
  // });
  //
  //
  // if (queryData >= lastDate) {
  //   $("#nextDay").attr("disabled", "disabled");
  //
  // }

  // Chamada da função getGrade
  getGrade(queryData);

  var nextdata = new Date;
  nextdata.setDate(nextdata.getDate() + 1);
  nextdia = nextdata.getDate();
  nextmes = nextdata.getMonth();
  nextd_s = dias[nextdata.getDay()].substring(0,3);
  nextano4 = nextdata.getFullYear();

  if (nextdia < 10) {
    nextdia = "0" + nextdia;
  }


  if (nextmes >= 9) {
    nextmes = "" + (nextmes + 1);
  } else {
    nextmes = "0" + (nextmes + 1);
  }

  var queryNextData = nextano4 + nextmes + nextdia;

  $.ajax({
    url: 'ultima_data.php',
    type: "POST",
    data: { getDia: queryNextData },
    success: function(resp) {
      if (resp == -1) {
        $("#nextDay").attr('disabled', 'disabled');
        $("#nextDay").addClass('disabled');
      } else {
         $('#nextDay').removeAttr('disabled');
         $("#nextDay").removeClass('disabled');
       }
     }
  });

  // Controlador que identifica as datas passadas e realiza a chamada da
  // função getGrade
  $('#lastDay').on('click', function () {

    data.setDate(data.getDate() - 1);
    dia = data.getDate();
    mes = data.getMonth();
    d_s = dias[data.getDay()].substring(0,3);
    ano4 = data.getFullYear();

    str_data = d_s + ', ' + dia + ' DE ' + meses[mes];
    $('#data').text(str_data);
    $('#nextDay').removeAttr('disabled');
    $("#nextDay").removeClass('disabled');

    if (dia < 10) {
      dia = "0" + dia;
    }

    if (mes >= 9) {
      mes = "" + (mes + 1);
    } else {
      mes = "0" + (mes + 1);
    }

    var queryData = ano4 + mes + dia;

    getGrade(queryData);

    var lastdata = new Date;
    lastdata.setDate(data.getDate() - 1);
    lastdia = lastdata.getDate();
    lastmes = lastdata.getMonth();
    lastd_s = dias[lastdata.getDay()].substring(0,3);
    lastano4 = lastdata.getFullYear();

    if (lastdia < 10) {
      lastdia = "0" + lastdia;
    }

    if (lastmes >= 9) {
      lastmes = "" + (lastmes + 1);
    } else {
      lastmes = "0" + (lastmes + 1);
    }

    var queryLastData = lastano4 + lastmes + lastdia;

    // console.log(queryLastData);

    $.ajax({
      url: 'ultima_data.php',
      type: "POST",
      data: { getDia: queryLastData },
      success: function(resp) {
        if (resp == -1) {
          $("#lastDay").attr('disabled', 'disabled');
          $("#lastDay").addClass('disabled');
        } else {
          $('#lastDay').removeAttr('disabled');
          $("#lastDay").removeClass('disabled');
        }
      }
    });
  });

  // Controlador que identifica as datas futuras e realiza a chamada da
  // função getGrade
  $('#nextDay').on('click', function () {
    data.setDate(data.getDate() + 1);
    dia = data.getDate();
    mes = data.getMonth();
    d_s = dias[data.getDay()].substring(0,3);
    ano4 = data.getFullYear();

    str_data = d_s + ', ' + dia + ' DE ' + meses[mes];
    $('#data').text(str_data);
    $('#lastDay').removeAttr('disabled');
    $("#lastDay").removeClass('disabled');

    if (dia < 10) {
      dia = "0" + dia;
    }

    if (mes >= 9) {
      mes = "" + (mes + 1);
    } else {
      mes = "0" + (mes + 1);
    }

    var queryData = ano4 + mes + dia;

    getGrade(queryData);

    var nextdata = new Date;
    nextdata.setDate(data.getDate() + 1);
    nextdia = nextdata.getDate();
    nextmes = nextdata.getMonth();
    nextd_s = dias[nextdata.getDay()].substring(0,3);
    nextano4 = nextdata.getFullYear();

    if (nextdia < 10) {
      nextdia = "0" + nextdia;
    }

    if (nextmes >= 9) {
      nextmes = "" + (nextmes + 1);
    } else {
      nextmes = "0" + (nextmes + 1);
    }

    var queryNextData = nextano4 + nextmes + nextdia;

    // console.log(queryNextData);

    $.ajax({
      url: 'ultima_data.php',
      type: "POST",
      data: { getDia: queryNextData },
      success: function(resp) {
        if (resp == -1) {
          $("#nextDay").attr('disabled', 'disabled');
          $("#nextDay").addClass('disabled');
        } else {
           $('#nextDay').removeAttr('disabled');
           $("#nextDay").removeClass('disabled');
         }
       }
    });

  });
});
