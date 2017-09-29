<?php

session_start();

if(!isset($_SESSION['login'])){
  header('Location: index.php?erro-login=1');
}

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$id = $_POST['identificador'];

$sql = " SELECT * FROM programa WHERE id = $id ";

$resultado = mysqli_query($link, $sql);

if ($resultado) {
  $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
  $myJSON = json_encode($registro);
  echo $myJSON;
} else {
  echo "Erro";
}


?>
