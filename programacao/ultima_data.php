<?php

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$data = $_POST['getDia'];

$sql = " SELECT id FROM dia WHERE data =  $data ";

$resultado = mysqli_query($link, $sql);

if (mysqli_num_rows($resultado) == 0) {
  echo -1;
} else {
  die();
}

?>
