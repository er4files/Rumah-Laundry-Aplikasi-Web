<?php 
	require_once('_functions.php');

	if (isset($_SESSION['login']) == '') {
		echo "<script>window.location='login.php';</script>";
	} 

	session_unset();
	session_destroy();
	$_SESSION = [];

	echo "<script>window.location='login.php';</script>";


?>
