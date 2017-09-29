<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $dia = $_POST['dia'];
  $programa = $_POST['programa'];

  $sql = " DELETE FROM dia_programa WHERE fk_dia = $dia && fk_programa = $programa ";

  if(mysqli_query($link, $sql)) {
    $sql = " SELECT data FROM dia WHERE id = $dia ";
    $resultado = mysqli_query($link, $sql);
    $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    echo date('d/m/Y', strtotime($registro['data']));
  } else {
    echo 0;
  }

?>
