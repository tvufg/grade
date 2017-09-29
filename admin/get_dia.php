<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $sql = " SELECT * FROM dia ORDER BY data DESC ";

  $resultado = mysqli_query($link, $sql);

  if ($resultado) {
    $i = 1;
    while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

      echo '<div class="panel panel-default" style="margin-top:10px;">';
        echo '<div class="panel-heading data-dia="'.$registro['id'].'">'; ////sdsd
        echo '<input style="float:left; margin-right: 15px;" type="checkbox" name="dia-rm" value="'.$registro['id'].'">';
          echo '<h5  style="display: inline-block; color: #009DE0" class="panel-title">';
            echo date('d/m/Y', strtotime($registro['data']));
          echo '</h5>';
         echo '<a style="padding: 5px 0px;" data-parent="#dias" href="#collapseDia'.$registro['id'].'" data-toggle="collapse">';
           echo '<b style="margin-top: -15px;" class="caret"></b>';
         echo '</a>';

        echo '</div>';
        echo '<div id="collapseDia'.$registro['id'].'" class="panel-collapse collapse">';
          echo '<div class="panel-body">';
            echo '<div class="conteiner-fluid">';
             echo '<div class="row">';
             echo '<p class="col-xs-2" style="font-size: 16px;">ID</p>';
             echo '<p class="col-xs-3" style="margin-left: 8px;font-size: 16px;">HORA</p>';
             echo '<p class="col-xs-5" style="font-size: 16px;">TÍTULO</p>';
             echo '<p class="col-xs-1" style="margin-left: -10px;font-size: 16px;">EDIT</p>';
             echo '</div>';
            $id_dia = $registro['id'];
            $sql = " SELECT * FROM dia_programa WHERE fk_dia = $id_dia ORDER BY hora ";
            $resultado_dia = mysqli_query($link, $sql);

            if ($resultado_dia) {
              while ($dia = mysqli_fetch_array($resultado_dia, MYSQLI_ASSOC)) {
                // echo '<div class="row" data-dia-pg="'.$dia['fk_dia'].'">';
                echo '<div class="row" data-dia-pg="'.$registro['data'].'">';

                  $id_programa = $dia['fk_programa'];
                  $sql = " SELECT * FROM programa WHERE id = $id_programa ";
                  $resultado_programa = mysqli_query($link, $sql);

                  if ($resultado_programa) {
                    $registro_programa = mysqli_fetch_array($resultado_programa, MYSQLI_ASSOC);
                    echo '<p id="dia-pg" class="col-xs-2" style="overflow-x: hidden; text-overflow: ellipsis; white-space: nowrap;">'.$registro_programa['id'].'</p>';
                    echo '<p class="col-xs-3" style="margin-left: 8px;">'.$registro_programa['hora'].'</p>';
                    echo '<p class="col-xs-5">'.$registro_programa['titulo'].'</p>';
                    echo '<button onclick="pdremove('.$dia['fk_dia'].','.$registro_programa['id'].')" class="col-xs-1 btn btn-simple btn-danger btn-sm" style="margin-top: -5px;" data-toggle="tooltip" data-placement="bottom" title="Remover"><i class="fa fa-remove"></i></button>';
                  } else {
                    echo "Erro na consulta";
                  }


                echo '</div>';
              }
            } else {
              echo "Erro na consulta";
            }

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
