<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $programas = $_POST['array'];
  $error = false;


  foreach ($programas as $programa) {
    $sql = " SELECT * FROM programa WHERE id = $programa ";
    $resultado = mysqli_query($link, $sql);
    if ($resultado) {
      $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      $titulo = $registro['titulo'];
      $descricao = $registro['descricao'];
      $hora = $registro['hora'];
      $capa = $registro['img_capa'];
      $destaque = $registro['img_destaque'];
      $vm_destaque = $registro['video_destaque'];
      $cc = $registro['cc'];
      $violencia = $registro['violencia'];
      $sexo = $registro['sexo'];
      $drogas = $registro['drogas'];
      $classificacao = $registro['classificacao'];
      $link_site = $registro['link'];
      $subtitulo = $registro['subtitulo'];
      $ad = $registro['ad'];
      $er = $registro['er'];
      $gapp = $registro['ga'];
      $titulo_original = $registro['filme_titulo'];
      $elenco = $registro['filme_elenco'];
      $direcao = $registro['filme_direcao'];
      $nacionalidade = $registro['filme_nacionalidade'];
      $genero = $registro['filme_genero'];
      $outros = $registro['filme_outros'];

      $sql = " INSERT INTO programa(titulo, descricao, hora, img_capa, img_destaque, video_destaque, cc, violencia, sexo, drogas, classificacao, link, subtitulo, ad, ga, filme_titulo, filme_elenco, filme_direcao, filme_nacionalidade, filme_genero, filme_outros)values('$titulo', '$descricao', '$hora', '$capa', '$destaque', '$vm_destaque', $cc, $violencia, $sexo, $drogas, $classificacao, '$link_site', '$subtitulo', $ad, $gapp, '$titulo_original', '$elenco', '$direcao', '$nacionalidade', '$genero', '$outros')";
      if (!mysqli_query($link, $sql)) {
        $error = true;
      }
    }
    // if(!mysqli_query($link, $sql)){
    //     // echo mysqli_error($link);
    //     $error = true;
    // }
  }

  if ($error == true) {
    echo -1;
  }
?>
