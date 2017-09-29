<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

  require_once('db.class.php');

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $id = $_POST['id'];
  $titulo = $_POST['titulo'];
  $subtitulo = $_POST['subtitulo'];
  $descricao = $_POST['descricao'];
  $hora = $_POST['hora'];
  $capa = $_POST['img_capa'];
  $destaque = $_POST['img_destaque'];
  $vm_destaque = $_POST['video_destaque'];
  $classificacao = $_POST['classificacao'];
  $cc = $_POST['cc'];
  $ad = $_POST['ad'];
  $gapp = $_POST['ga'];
  $violencia = $_POST['violencia'];
  $sexo = $_POST['sexo'];
  $drogas = $_POST['drogas'];
  $link_site = $_POST['link'];
  $link_mais = $_POST['link_mais'];
  $titulo_original = $_POST['titulo_original'];
  $elenco = $_POST['elenco'];
  $direcao = $_POST['direcao'];
  $nacionalidade = $_POST['nacionalidade'];
  $genero = $_POST['genero'];
  $outros = $_POST['outros'];

  $update = false;

  if ($id == '') {
    $sql = " INSERT INTO programa(titulo, descricao, hora, img_capa, img_destaque, video_destaque, cc, violencia, sexo, drogas, classificacao, link, link_mais, subtitulo, ad, ga, filme_titulo, filme_elenco, filme_direcao, filme_nacionalidade, filme_genero, filme_outros)values('$titulo', '$descricao', '$hora', '$capa', '$destaque', '$vm_destaque', $cc, $violencia, $sexo, $drogas, $classificacao, '$link_site', '$link_mais', '$subtitulo', $ad, $gapp, '$titulo_original', '$elenco', '$direcao', '$nacionalidade', '$genero', '$outros')";

  } else {
    $sql = " UPDATE programa SET titulo = '$titulo', descricao = '$descricao', hora = '$hora', img_capa = '$capa', img_destaque = '$destaque', video_destaque = '$vm_destaque', cc = $cc, violencia = $violencia, sexo = $sexo, drogas = $drogas, classificacao = $classificacao, link = '$link_site', link_mais = '$link_mais', subtitulo = '$subtitulo', ga = $gapp, ad = $ad, filme_titulo = '$titulo_original', filme_elenco = '$elenco', filme_direcao = '$direcao', filme_nacionalidade = '$nacionalidade', filme_genero = '$genero', filme_outros = '$outros' WHERE id = $id";

    $update = true;
  }

  if(mysqli_query($link, $sql)) {
    echo 1;

    if($update == true) {
      $sql = " UPDATE dia_programa SET hora = '$hora' WHERE fk_programa = $id ";
      if(mysqli_query($link, $sql)) {
        echo 1;
      }
    }

  } else echo mysqli_error($link);;

?>
