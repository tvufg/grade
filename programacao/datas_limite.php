<?php

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$lastDate = "";
$firstDate = "";

$sql = " SELECT MAX(data) FROM dia";
$resultado = mysqli_query($link, $sql);
$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

if ($registro) {
  $lastDate = $registro["MAX(data)"];
}

$sql = " SELECT MIN(data) FROM dia";
$resultado = mysqli_query($link, $sql);
$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

if ($registro) {
  $firstDate = $registro["MIN(data)"];
}

echo $firstDate."/".$lastDate;

?>
