<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$dias = $_POST['array'];
$sql = " DELETE FROM dia WHERE id IN (";
foreach ($dias as $dia) {
  $sql = $sql."$dia".", ";

  $sql_dia = " DELETE FROM dia_programa WHERE fk_dia = $dia ";
  if(!mysqli_query($link, $sql_dia)){
      echo mysqli_error($link);
  }

}

$sql = substr($sql, 0, -2);
$sql = $sql.')';
if(mysqli_query($link, $sql)){
  echo 1;
} else {
  // echo 0;
  echo mysqli_error($link);
}

?>
