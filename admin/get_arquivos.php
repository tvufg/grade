<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

$arquivos = glob("../pdf/*.*");
// fazer echo de cada pdf
$cont = 1;
foreach($arquivos as $arquivo){
  $nome_pdf = explode("/", $arquivo);

  // $rest = substr($nome_img[3], 0, 24);
  echo '<tr>';
    echo '<td class="text-center"><input value="'.$arquivo.'" type="checkbox"></td>';
    // echo '<td class="text-center">'.$cont.'</td>';
    echo '<td>'.$nome_pdf[2].'</td>';
    echo '<td class="td-actions text-right">';
    echo '<a href="'.$arquivo.'" target="_blank" rel="tooltip" data-placement="bottom" title="Visualizar" class="btn btn-warning btn-simple btn-xs">';
      echo '<i class="fa fa-file-pdf-o"></i>';
    echo '</a>';
      echo '<a onclick="removerPDF('."'".$arquivo."'".')" rel="tooltip" data-placement="bottom" title="Remover" class="btn btn-danger btn-simple btn-xs">';
        echo '<i class="fa fa-times"></i>';
      echo '</a>';
    echo '</td>';
  echo '</tr>';
  $cont = $cont + 1;
  }
?>
