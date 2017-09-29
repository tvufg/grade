<?php

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$data = $_POST['getDia'];

$sql = " SELECT id FROM dia WHERE data =  $data ";

$resultado = mysqli_query($link, $sql);

$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

$dia = $registro['id'];

// var_dump($registro);

$sql = " SELECT fk_programa FROM dia_programa WHERE fk_dia = $dia ORDER BY hora ";

$resultado = mysqli_query($link, $sql);

// $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
//
// var_dump($registro);

$i = 1;

if (!$resultado) {
  die();
}

date_default_timezone_set('America/Sao_Paulo');
$date = date('H:i');
$hourTime = explode(":", $date);

//Diferenca minima entre as horas de inicio de um programa
$diferencaHora = 5;

while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

  $pg = $registro['fk_programa'];

  $sql = " SELECT * FROM programa WHERE id = $pg ";

  $re = mysqli_query($link, $sql);

  $reg = mysqli_fetch_array($re, MYSQLI_ASSOC);


  echo  '<div class="panel panel-default">';
    echo  '<div class="panel-heading" role="tab" id="heading'.$reg['id'].'">';
      echo '<h4 class="panel-title">';
        echo '<a class="collapsed collapse-programa stop" data-iframe="'.$i.'" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$reg['id'].'" aria-expanded="false" aria-controls="collapse'.$reg['id'].'">';
          echo '<img class="grade-logo" src="'.$reg['img_capa'].'"/>';

          // $hourReg = explode(":", $reg['hora']);
          //
          // if($hourTime[0] == $hourReg[0]) {
          //   $diferencaHoraPG = $hourTime[1] - $hourReg[1];
          //   if($diferencaHoraPG >= 0 && $diferencaHoraPG < $diferencaHora) {
          //     echo '<span class="time" style="display: none;">'.$reg['hora'].'</span>';
          //     echo '<span class="no-ar">NO AR</span>';
          //   } else {
          //     echo '<span class="time">'.$reg['hora'].'</span>';
          //     echo '<p class="no-ar" style="display: none;">NO AR</p>';
          //   }
          //
          // } else {
          //   echo '<span class="time">'.$reg['hora'].'</span>';
          //   echo '<p class="no-ar" style="display: none;">NO AR</p>';
          // }

          echo '<span class="time">'.$reg['hora'].'</span>';
          // echo '<p class="no-ar" style="display: none;">NO AR</p>';

          echo '<h2 class="grade-title">'.$reg['titulo'].'</h2>';
          echo '<i class="nc-icon nc-minimal-down"></i>';
        echo '</a>';
      echo '</h4>';
    echo '</div>';

    echo '<div id="collapse'.$reg['id'].'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$reg['id'].'">';
      echo '<div class="row">';
        echo '<div class="col-sm-5 grade-thumb">';
          if ($reg['video_destaque'] != '' ) {
            $mg_top = '-50px';
            echo '<div class="embed-responsive embed-responsive-16by9 video" style="border-radius: 4px;">';
            echo '<iframe target-iframe="'.$i.'" id="player-iframe" class="embed-responsive-item" src="'.$reg['video_destaque'].'" allowfullscreen></iframe>';
            echo '</div>';
          } else {
            echo '<img class="img" src="'.$reg['img_destaque'].'" width="353" height="198" style="border-radius: 2px;"/>';
          }

          $hasLink = false;

          if ($reg['link'] != '' ) {
            echo '<a class="pg-link" href="'.$reg['link'].'" target="_blank">VISITE O SITE <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
            $hasLink = true;
          }

          if ($reg['link_mais'] != '' ) {
            if ($hasLink == false) {
              echo '<a id="link-more" style="float: none !important;" class="pg-link" href="'.$reg['link_mais'].'" target="_blank">MAIS EPISODIOS <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
            } else {
              echo '<a id="link-more" class="pg-link" href="'.$reg['link_mais'].'" target="_blank">MAIS EPISODIOS <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
            }
          }

        echo '</div>';
        echo '<div class="col-sm-7 grade-info">';
          if ($reg['subtitulo'] != '') {
            echo '<h5 style="color: #009DE0; font-size: 16px; font-weight: bold;">'.$reg['subtitulo'].'</h5>';
          } else {
            echo '<h5 style="color: #009DE0; font-size: 16px; font-weight: bold;">'.$reg['titulo'].'</h5>';
          }

          echo '<p style="font-size: 14px;" align="justify">'.$reg['descricao'].'</p>';

          if ($reg['cc'] == 1) {
            echo '<img class="tag-info" src="../imagens/CC.png" data-toggle="tooltip" data-placement="bottom" title="Closed Caption"/>';
          }

          if ($reg['ad'] == 1) {
            echo '<img class="tag-info" src="../imagens/AD.png" data-toggle="tooltip" data-placement="bottom" title="Audiodescrição"/>';
          }

          if ($reg['ga'] == 1) {
            echo '<img class="tag-info" src="../imagens/TVDi.png" data-toggle="tooltip" data-placement="bottom" title="Televisão Digital Interativa"/>';
          }

          $cls = "";

           if ($reg['classificacao'] == 1) {
            $cls = "white";
            echo '<img class="tag-info '.$cls.'-tooltip" src="../imagens/ER.png" data-toggle="tooltip" data-placement="bottom" title="Especialmente recomendado para crianças e adolescentes"/>';
          } else {
            $title = '';
            if ($reg['classificacao'] == 0) {
              $cls = "green";
              $title = 'Livre para todos os públicos.<br/>Não espõe crianças a conteúdos potencialmente prejudiciais.';
            } else {
              $title = 'Não recomendado para menores de '.$reg['classificacao'].' anos.<br/>';
            }
            if ($reg['classificacao'] == 10) {
                $cls = "blue";
                $title = $title.'Conteúdo violento ou linguagem inapropriada para crianças, ainda que em menor intensidade.';
            } else if ($reg['classificacao'] == 12) {
                $cls = "yellow";
                $title = $title.'As cenas podem conter agressão física, consumo de drogras e insinuação sexual.';
            } else if ($reg['classificacao'] == 14) {
                $cls = "orange";
                $title = $title.'Conteúdos mais acentuados com violência e ou linguagem sexual.';
            } else if ($reg['classificacao'] == 16) {
                $cls = "red";
                $title = $title.'Conteúdos de sexo ou violência mais intensos, com cenas de tortura, suicídio, estrupo ou nudez total.';
            } else if ($reg['classificacao'] == 18) {
                $cls = "black";
                $title = $title.'Conteúdos violentos e sexuais extremos. Cenas de sexo, incesto ou atos repetidos de tortura, multilação ou abuso sexual.';
            }
            echo '<img class="tag-info '.$cls.'-tooltip" src="../imagens/'.$reg['classificacao'].'.png" data-toggle="tooltip" data-placement="bottom" title="'.$title.'"/>';

          }

          if ($reg['filme_titulo'] != '' || $reg['filme_elenco'] != '' || $reg['filme_direcao'] != '' || $reg['filme_nacionalidade'] != '' || $reg['filme_genero'] != '' || $reg['filme_outros'] != '' ) {
            echo '<br/>';
            echo '<div>';
              echo '<h4 style="font-size: 11px; margin: 15px 0px 5px 0px; line-height: inherit; font-weight: bold;">MAIS INFORMAÇÕES</h4>';
              if ($reg['filme_titulo'] != '') {
                echo '<span class="pg-descricao-title">Título Original: </span>';
                echo '<span class="pg-descricao">'.$reg['filme_titulo'].'</span>';
                echo '<br/>';
              }

              if ($reg['filme_elenco'] != '') {
                              echo '<span class="pg-descricao-title">Elenco: </span>';
                              echo '<span class="pg-descricao">'.$reg['filme_elenco'].'</span>';
                              echo '<br/>';
                            }

                            if ($reg['filme_direcao'] != '') {
                              echo '<span class="pg-descricao-title">Direção: </span>';
                              echo '<span class="pg-descricao">'.$reg['filme_direcao'].'</span>';
                              echo '<br/>';
                            }

                            if ($reg['filme_nacionalidade'] != '') {
                              echo '<span class="pg-descricao-title">Nacionalidade: </span>';
                              echo '<span class="pg-descricao">'.$reg['filme_nacionalidade'].'</span>';
                              echo '<br/>';
                            }

                            if ($reg['filme_genero'] != '') {
                              echo '<span class="pg-descricao-title">Gênero: </span>';
                              echo '<span class="pg-descricao">'.$reg['filme_genero'].'</span>';
                            }

                          echo '</div>';
                        }

        echo '</div>';
      echo '</div>';
    echo '</div>';
  echo '</div>';

// echo '<div class="panel panel-default" style="padding-top:12px; margin-top:0px;">';
//   echo '<div id="collapse'.$i.'" class="panel-collapse collapse">';
//     echo '<div class="panel-body" style="border-top: 0px solid #ddd; box-shadow: inset 0 0px 0px 0px rgba(0, 0, 0, 0.14)">';
//       echo '<div class="conteiner-fluid">';
//         echo '<div class="col-md-5 col-xs-12" style="max-width: 400px;">';
//         if ($reg['video_destaque'] != '' ) {
//           $mg_top = '-50px';
//           echo '<div class="embed-responsive embed-responsive-16by9 video" style="margin-left: 30px; padding-right: 0px; border-radius: 4px;">';
//           echo '<iframe target-iframe="'.$i.'" id="player-iframe" class="embed-responsive-item" src="'.$reg['video_destaque'].'" allowfullscreen></iframe>';
//           echo '</div>';
//         } else {
//           // data-action="zoom"
//           $mg_top = '0px';
//           echo '<img class="img" src="../'.$reg['img_destaque'].'" width="353" height="198" style="margin-left: 30px; padding-right: 0px; border-radius: 2px;"/>';
//         }
//           if ($reg['link'] != '' ) {
//             echo '<br/>';
//             echo '<a href="'.$reg['link'].'" target="_blank" style="color: #009DE0; margin-left: 30px; display: inline-block;margin-top: '.$mg_top.'; font-size: 12px; font-weight: bold;">VISITE O SITE <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
//           }
//
//         echo '</div>';
//
//         echo '<div class="col-md-7 col-xs-12" style="min-height: 220px;">';
//         if ($reg['subtitulo'] != '') {
//           echo '<h5 style="color: #009DE0; margin-left: 20px; margin-top: 0px; margin-bottom: 10px; font-size: 16px; font-weight: bold;">'.$reg['subtitulo'].'</h5>';
//         } else {
//           echo '<h5 style="color: #009DE0; margin-left: 20px; margin-top: 0px; margin-bottom: 10px; font-size: 16px; font-weight: bold;">'.$reg['titulo'].'</h5>';
//         }
//           echo '<p class="font-verdana" style="font-size: 14px; margin-left: 20px;" align="justify">'.$reg['descricao'].'</p>';
//
//             echo '<div style="margin-left: 20px;">';
//             if ($reg['cc'] == 1) {
//               echo '<img src="../imagens/CC.png" style="margin-right: 10px;width: 26px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Closed Caption"/>';
//             }
//
//             if ($reg['ad'] == 1) {
//               echo '<img src="../imagens/AD.png" style="margin-right: 10px;width: 26px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Audiodescrição"/>';
//             }
//
//
//             if ($reg['ga'] == 1) {
//               echo '<img src="../imagens/TVDi.png" style="margin-right: 10px;width: 34px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Televisão Digital Interativa"/>';
//             }
//
//             $cls = "";
//
//             // if ($reg['classificacao'] == -1) {
//             //   echo '<img src="imagens/N_A.png" style="margin-right: 10px;width: 26px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Sem classificação"/>';
//             // } else
//              if ($reg['classificacao'] == 1) {
//               $cls = "white";
//               echo '<img class="'.$cls.'-tooltip" src="../imagens/ER.png" style="margin-right: 10px;width: 26px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Especialmente recomendado para crianças e adolescentes"/>';
//             } else {
//               $title = '';
//               if ($reg['classificacao'] == 0) {
//                 $cls = "green";
//                 $title = 'Livre para todos os públicos.<br/>Não espõe crianças a conteúdos potencialmente prejudiciais.';
//               }
//               // else if ($reg['classificacao'] == -1) {
//               //   $title = 'Sem classificação indicativa';
//               // }
//               else {
//                 $title = 'Não recomendado para menores de '.$reg['classificacao'].' anos.<br/>';
//               }
//               if ($reg['classificacao'] == 10) {
//                   $cls = "blue";
//                   $title = $title.'Conteúdo violento ou linguagem inapropriada para crianças, ainda que em menor intensidade.';
//               } else if ($reg['classificacao'] == 12) {
//                   $cls = "yellow";
//                   $title = $title.'As cenas podem conter agressão física, consumo de drogras e insinuação sexual.';
//               } else if ($reg['classificacao'] == 14) {
//                   $cls = "orange";
//                   $title = $title.'Conteúdos mais acentuados com violência e ou linguagem sexual.';
//               } else if ($reg['classificacao'] == 16) {
//                   $cls = "red";
//                   $title = $title.'Conteúdos de sexo ou violência mais intensos, com cenas de tortura, suicídio, estrupo ou nudez total.';
//               } else if ($reg['classificacao'] == 18) {
//                   $cls = "black";
//                   $title = $title.'Conteúdos violentos e sexuais extremos. Cenas de sexo, incesto ou atos repetidos de tortura, multilação ou abuso sexual.';
//               }
//               echo '<img class="'.$cls.'-tooltip" src="../imagens/'.$reg['classificacao'].'.png" style="width: 26px; height: 26px;" data-toggle="tooltip" data-placement="bottom" title="'.$title.'"/>';
//             // if ($reg['link'] != '' ) {
//             //   echo '<a href="'.$reg['link'].'" style="margin-left: 10px; font-size: 12px; font-weight: bold;">VISITE O SITE <i class="fa fa-arrow-right"></i></a>';
//             // }
//             }
//
//               if ($reg['filme_titulo'] != '' || $reg['filme_elenco'] != '' || $reg['filme_direcao'] != '' || $reg['filme_nacionalidade'] != '' || $reg['filme_genero'] != '' || $reg['filme_outros'] != '' ) {
//                 echo '<br/>';
//                 echo '<div>';
//                   echo '<h4 style="font-size: 11px; margin: 15px 0px 5px 0px; line-height: inherit; font-weight: bold;">MAIS INFORMAÇÕES</h4>';
//                   if ($reg['filme_titulo'] != '') {
//                     echo '<span style="font-size: 14px; font-weight: bold;">Título Original: </span>';
//                     echo '<span style="font-size: 14px;">'.$reg['filme_titulo'].'</span>';
//                     echo '<br/>';
//                   }
//
//                   if ($reg['filme_elenco'] != '') {
//                     echo '<span style="font-size: 14px; font-weight: bold;">Elenco: </span>';
//                     echo '<span style="font-size: 14px;">'.$reg['filme_elenco'].'</span>';
//                     echo '<br/>';
//                   }
//
//                   if ($reg['filme_direcao'] != '') {
//                     echo '<span style="font-size: 14px; font-weight: bold;">Direção: </span>';
//                     echo '<span style="font-size: 14px;">'.$reg['filme_direcao'].'</span>';
//                     echo '<br/>';
//                   }
//
//                   if ($reg['filme_nacionalidade'] != '') {
//                     echo '<span style="font-size: 14px; font-weight: bold;">Nacionalidade: </span>';
//                     echo '<span style="font-size: 14px;">'.$reg['filme_nacionalidade'].'</span>';
//                     echo '<br/>';
//                   }
//
//                   if ($reg['filme_genero'] != '') {
//                     echo '<span style="font-size: 14px; font-weight: bold;">Gênero: </span>';
//                     echo '<span style="font-size: 14px;">'.$reg['filme_genero'].'</span>';
//                   }
//
//                 echo '</div>';
//               }
//
//             echo '</div>';
//
//         echo '</div>';
//       echo '</div>';
//     echo '</div>';
//   echo '</div>';
// echo '</div>';

  $i = $i + 1;

}
?>
