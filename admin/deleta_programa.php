<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $programas = $_POST['array'];
  $sql = " DELETE FROM programa WHERE id IN (";
  foreach ($programas as $programa) {
    $sql = $sql."$programa".", ";
    $sql_programa = " DELETE FROM dia_programa WHERE fk_programa = $programa ";
    if(!mysqli_query($link, $sql_programa)){
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
