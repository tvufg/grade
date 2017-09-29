<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  if(empty($_POST['array'])) {
    echo -1;
    die();
  } else {

  $arquivos = $_POST['array'];

  foreach ($arquivos as $arquivo) {
    if (!unlink($arquivo)) {
      echo 0;
    } else {
      echo 1;
    }
  }
}

?>
