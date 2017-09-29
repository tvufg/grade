<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $sql = " SELECT * FROM programa ORDER BY id DESC ";

  $resultado = mysqli_query($link, $sql);

  if ($resultado) {
    $i = 1;
    while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

    echo '<div class="panel panel-default" style="padding-top:12px; margin-top:0px;">';
      echo  '<div class="panel-heading" style="padding-bottom: 12px;" data-id="'.$registro['id'].'">';
        echo '<input style="margin-right: 15px;" type="checkbox" name="pg-rm" value="'.$registro['id'].'">';
        echo '<h4 class="font-verdana" style="display: inline-block; font-size: 16px; margin-top: 0px; margin-right: 15px; width:50px; overflow-x: hidden; text-overflow: ellipsis; white-space: nowrap; margin-bottom: -12px;">'.$registro['id'].'</h4>';
        echo '<img style="width: 94px; height: 55px; border-radius: 2px; margin-right: 20px;" src="'.$registro['img_capa'].'"/>';
        echo '<p class="font-verdana" style="display: inline-block; font-size: 16px; margin-right: 16px; font-weight:100">'.$registro['hora'].'</p>';
        echo '<h4 class="font-verdana" style="display: inline-block; font-size: 16px; font-weight: 500; margin-top: 0px;">'.$registro['titulo'].'</h4>';
        echo  '<a class="se" style="display: inline;" data-toggle="collapse" data-parent="#programas" href="#collapse'.$i.'" onclick="bkg(this)">';
        echo '<b data-iframe="'.$i.'" style="border-top-width: 7px; border-left-width: 7px; border-right-width: 7px;"class="caret stop" data-toggle="tooltip" data-placement="bottom" title="Exibir detalhes"></b>';
        echo '</a>';
        echo '<button onclick="peditar('.$registro['id'].')" type="button" id="btn-editar" style="float: right; margin-top: 12px;"class="btn btn-simple btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar programa"><i class="fa fa-edit"></i></button>';

      echo '</div>';
      echo '<div id="collapse'.$i.'" class="panel-collapse collapse">';
        echo '<div class="panel-body" style="border-top: 0px solid #ddd; box-shadow: inset 0 0px 0px 0px rgba(0, 0, 0, 0.14)">';
          echo '<div class="conteiner-fluid">';
            echo '<div class="col-md-5 col-xs-12" style="max-width: 400px;">';
            if ($registro['video_destaque'] != '' ) {
              $mg_top = '-50px';
              echo '<div class="embed-responsive embed-responsive-16by9 video" style="margin-left: 30px; padding-right: 0px; border-radius: 4px;">';
              echo '<iframe target-iframe="'.$i.'" id="player-iframe" class="embed-responsive-item" src="'.$registro['video_destaque'].'" allowfullscreen></iframe>';
              echo '</div>';
            } else {

              $mg_top = '0px';
              echo '<img class="img" src="'.$registro['img_destaque'].'" width="353" height="198" style="margin-left: 30px; padding-right: 0px; border-radius: 2px;"/>';
            }

            if ($registro['link'] != '' || $registro['link_mais'] != '' ) {
              echo '<div>';
              if ($registro['link'] != '' ) {
                echo '<a href="'.$registro['link'].'" target="_blank" style="color: #009DE0; margin-left: 30px; display: inline-block;margin-top: '.$mg_top.'; font-size: 12px; font-weight: bold;">VISITE O SITE <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
              }
              if ($registro['link_mais'] != '' ) {
                echo '<a href="'.$registro['link_mais'].'" target="_blank" style="color: #009DE0; margin-left: 30px; display: inline-block;margin-top: '.$mg_top.'; font-size: 12px; font-weight: bold;">MAIS EPISODIOS <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
              }
              echo '</div>';

            }

              // if ($registro['link'] != '' ) {
              //   echo '<br/>';
              //   echo '<a href="'.$registro['link'].'" target="_blank" style="color: #009DE0; margin-left: 30px; display: inline-block;margin-top: '.$mg_top.'; font-size: 12px; font-weight: bold;">VISITE O SITE <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
              // }
              //
              // if ($registro['link_mais'] != '' ) {
              //   echo '<br/>';
              //   echo '<a href="'.$registro['link_mais'].'" target="_blank" style="color: #009DE0; margin-left: 30px; display: inline-block;margin-top: '.$mg_top.'; font-size: 12px; font-weight: bold;">MAIS EPISODIOS <i style="margin-top: 20px;" class="fa fa-arrow-right"></i></a>';
              // }

            echo '</div>';

            echo '<div class="col-md-7 col-xs-12" style="min-height: 220px;">';
            if ($registro['subtitulo'] != '') {
              echo '<h5 style="color: #009DE0; margin-left: 20px; margin-top: 0px; margin-bottom: 10px; font-size: 16px; font-weight: bold;">'.$registro['subtitulo'].'</h5>';
            } else {
              echo '<h5 style="color: #009DE0; margin-left: 20px; margin-top: 0px; margin-bottom: 10px; font-size: 16px; font-weight: bold;">'.$registro['titulo'].'</h5>';
            }
              echo '<p class="font-verdana" style="font-size: 14px; margin-left: 20px;" align="justify">'.$registro['descricao'].'</p>';

                echo '<div style="margin-left: 20px;">';
                if ($registro['cc'] == 1) {
                  echo '<img src="../imagens/CC.png" style="margin-right: 10px;width: 26px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Closed Caption"/>';
                }

                if ($registro['ad'] == 1) {
                  echo '<img src="../imagens/AD.png" style="margin-right: 10px;width: 26px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Audiodescrição"/>';
                }


                if ($registro['ga'] == 1) {
                  echo '<img src="../imagens/TVDi.png" style="margin-right: 10px;width: 34px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Televisão Digital Interativa"/>';
                }

                $cls = "";

                 if ($registro['classificacao'] == 1) {
                  $cls = "white";
                  echo '<img class="'.$cls.'-tooltip" src="../imagens/ER.png" style="margin-right: 10px;width: 26px; height: 26px;"data-toggle="tooltip" data-placement="bottom" title="Especialmente recomendado para crianças e adolescentes"/>';
                } else {
                  $title = '';
                  if ($registro['classificacao'] == 0) {
                    $cls = "green";
                    $title = 'Livre para todos os públicos.<br/>Não espõe crianças a conteúdos potencialmente prejudiciais.';
                  }

                  else {
                    $title = 'Não recomendado para menores de '.$registro['classificacao'].' anos.<br/>';
                  }
                  if ($registro['classificacao'] == 10) {
                      $cls = "blue";
                      $title = $title.'Conteúdo violento ou linguagem inapropriada para crianças, ainda que em menor intensidade.';
                  } else if ($registro['classificacao'] == 12) {
                      $cls = "yellow";
                      $title = $title.'As cenas podem conter agressão física, consumo de drogras e insinuação sexual.';
                  } else if ($registro['classificacao'] == 14) {
                      $cls = "orange";
                      $title = $title.'Conteúdos mais acentuados com violência e ou linguagem sexual.';
                  } else if ($registro['classificacao'] == 16) {
                      $cls = "red";
                      $title = $title.'Conteúdos de sexo ou violência mais intensos, com cenas de tortura, suicídio, estrupo ou nudez total.';
                  } else if ($registro['classificacao'] == 18) {
                      $cls = "black";
                      $title = $title.'Conteúdos violentos e sexuais extremos. Cenas de sexo, incesto ou atos repetidos de tortura, multilação ou abuso sexual.';
                  }
                  echo '<img class="'.$cls.'-tooltip" src="../imagens/'.$registro['classificacao'].'.png" style="width: 26px; height: 26px;" data-toggle="tooltip" data-placement="bottom" title="'.$title.'"/>';
                }

                  if ($registro['filme_titulo'] != '' || $registro['filme_elenco'] != '' || $registro['filme_direcao'] != '' || $registro['filme_nacionalidade'] != '' || $registro['filme_genero'] != '' || $registro['filme_outros'] != '' ) {
                    echo '<br/>';
                    echo '<div>';
                      echo '<h4 style="font-size: 11px; margin: 15px 0px 5px 0px; line-height: inherit; font-weight: bold;">MAIS INFORMAÇÕES</h4>';
                      if ($registro['filme_titulo'] != '') {
                        echo '<span style="font-size: 14px; font-weight: bold;">Título Original: </span>';
                        echo '<span style="font-size: 14px;">'.$registro['filme_titulo'].'</span>';
                        echo '<br/>';
                      }

                      if ($registro['filme_elenco'] != '') {
                        echo '<span style="font-size: 14px; font-weight: bold;">Elenco: </span>';
                        echo '<span style="font-size: 14px;">'.$registro['filme_elenco'].'</span>';
                        echo '<br/>';
                      }

                      if ($registro['filme_direcao'] != '') {
                        echo '<span style="font-size: 14px; font-weight: bold;">Direção: </span>';
                        echo '<span style="font-size: 14px;">'.$registro['filme_direcao'].'</span>';
                        echo '<br/>';
                      }

                      if ($registro['filme_nacionalidade'] != '') {
                        echo '<span style="font-size: 14px; font-weight: bold;">Nacionalidade: </span>';
                        echo '<span style="font-size: 14px;">'.$registro['filme_nacionalidade'].'</span>';
                        echo '<br/>';
                      }

                      if ($registro['filme_genero'] != '') {
                        echo '<span style="font-size: 14px; font-weight: bold;">Gênero: </span>';
                        echo '<span style="font-size: 14px;">'.$registro['filme_genero'].'</span>';
                      }

                    echo '</div>';
                  }

                echo '</div>';

            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    echo '</div>';

      $i = $i + 1;
    }
  } else {
    echo "Erro na consulta";
  }

?>
