<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

// selecionar só .jpg
$imagens = glob("uploads/*.*");

// fazer echo de cada imagem
foreach($imagens as $imagem){
  echo '<figure class="col-xs-6 col-sm-3 col-lg-2" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" style="display:inline;">';
    echo '<a href="'.$imagem.'" itemprop="contentUrl" data-size="600x400">';
      echo '<img src="'.$imagem.'" class="img-responsive"itemprop="thumbnail" alt="Image description"  style="margin: 0px 15px 15px 0px;"/>';
     echo '</a>';
   echo '</figure>';
}
?>
