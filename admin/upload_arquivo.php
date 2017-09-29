<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    // date_default_timezone_set("Brazil/East");

    $arquivoErro = 0;

    $no_files = count($_FILES["files"]['name']);
    for ($i = 0; $i < $no_files; $i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            // $ext = strtolower(substr($_FILES['files']['name'][$i],-3)); //Pegando extensão do arquivo
            // if ($ext != 'jpg') {
            //   $imgErro = $imgErro + 1;
            // } else {
            // $new_name = date("Y.m.d-H.i.s")."-".$i.$ext; //Definindo um novo nome para o arquivo
              if(!move_uploaded_file($_FILES["files"]["tmp_name"][$i], '../pdf/' . $_FILES['files']['name'][$i])) {
                $arquivoErro = $imgErro + 1;
              }
            // echo 'File successfully uploaded : uploads/' . $_FILES["files"]["name"][$i] . ' ';
            // }
            // echo 1;
        }
    }

    if ($arquivoErro > 0) {
      if ($arquivoErro == 1) {
        echo -1;
      } else {
        echo -2;
      }
    } else {
      echo 1;
    }
} else {
    echo 0;
}
?>
