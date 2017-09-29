<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  $imagens = $_POST['array'];

  foreach ($imagens as $imagem) {
    if (!unlink($imagem)) {
      echo 0;
    } else {
      echo 1;
    }
  }

?>
