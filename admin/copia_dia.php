<?php

	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: index.php?erro-login=1');
	}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $dias = $_POST['array'];
  $error = false;
  $programasErrorInsert = array();

  $data_novo_dia = $_POST['d'];

  $sql_dia = " SELECT * FROM dia WHERE data = '$data_novo_dia' ";

  $resultado = mysqli_query($link, $sql_dia);

  if (mysqli_num_rows($resultado) > 0) {
    echo 0;
  } else {

  foreach ($dias as $dia) {
    //Inserir o dia no banco
    $sql = " SELECT * FROM dia WHERE id = $dia ";
    $resultado = mysqli_query($link, $sql);
    if ($resultado) {
      $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      $data = $registro['data'];

      $sql = " INSERT INTO dia (data) values('$data_novo_dia')";
      if (!mysqli_query($link, $sql)) {
        $error = true;
      } else {
        $id_dia = mysqli_insert_id ($link);

        $sql = " SELECT * FROM dia_programa WHERE fk_dia = $dia ";
        $resultado = mysqli_query($link, $sql);
        if ($resultado) {
          $resultado_dia = mysqli_query($link, $sql);
          while ($registro_dia = mysqli_fetch_array($resultado_dia, MYSQLI_ASSOC)) {
            // echo $id_dia." ".$registro_dia['fk_programa']." ";
               $fk_programa = $registro_dia['fk_programa'];

               $sql = " SELECT hora FROM programa WHERE id = $fk_programa";
               $r = mysqli_query($link, $sql);
               $h = mysqli_fetch_array($r, MYSQLI_ASSOC);
               $hora = $h['hora'];

               $sql = " INSERT INTO `dia_programa`(`fk_dia`, `fk_programa`, `hora`) VALUES ($id_dia, $fk_programa, '$hora') ";
               if(!mysqli_query($link, $sql)) {
                 $programasErrorInsert[] = $fk_programa;
                 $error = true;
               }
          }
        } else {
          $error = true;
        }

      }

    }
    // if(!mysqli_query($link, $sql)){
    //     // echo mysqli_error($link);
    //     $error = true;
    // }
  }
  if ($error == true) {
    echo -1;
  } else {
    echo 1;
  }
}


?>
