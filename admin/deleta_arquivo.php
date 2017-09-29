<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  $arquivo = $_POST['arquivo'];

  if (!unlink($arquivo)) {
    echo 0;
  } else {
    echo 1;
  }


?>
