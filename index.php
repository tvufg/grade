<?php

	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: /grade/admin/index.php');
	} else {
		header('Location: /grade/admin/dashboard.php');
		die();
	}
?>
