<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $data = $_POST['dia'];
  $programas = $_POST['array_dia'];

  $sql_dia = " SELECT * FROM dia WHERE data = '$data' ";

  $resultado = mysqli_query($link, $sql_dia);

  if (mysqli_num_rows($resultado) > 0) {

    $dia = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

    $id_dia = $dia['id'];


    $sql = " SELECT fk_programa FROM dia_programa WHERE fk_dia = $id_dia ";

    $resultado_pg = mysqli_query($link, $sql);

    $pgs = mysqli_fetch_array($resultado_pg, MYSQLI_ASSOC);

    foreach ($programas as $programa) {
      $sql = " SELECT hora FROM programa WHERE id = $programa";
      $r = mysqli_query($link, $sql);
      $h = mysqli_fetch_array($r, MYSQLI_ASSOC);
      $hora = $h['hora'];
      $sql = " INSERT INTO `dia_programa`(`fk_dia`, `fk_programa`, `hora`) VALUES ($id_dia ,$programa, '$hora') ";
      mysqli_query($link, $sql);
    }


    echo $id_dia;
  } else {

  $sql = " INSERT INTO `dia`(`data`) VALUES ('$data') ";

  mysqli_query($link, $sql);

  $id_dia = mysqli_insert_id($link);

  foreach ($programas as $programa) {
    $sql = " SELECT hora FROM programa WHERE id = $programa";
    $r = mysqli_query($link, $sql);
    $h = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $hora = $h['hora'];
    $sql = " INSERT INTO `dia_programa`(`fk_dia`, `fk_programa`, `hora`) VALUES ($id_dia ,$programa, '$hora') ";
    mysqli_query($link, $sql);
  }
  echo $id_dia;

}


?>
