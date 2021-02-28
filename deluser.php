<?php
require_once("./includes/connect.php");

	$pdoQuery = "DELETE From users where id = " . $_GET['id'];
	$pdoresult = $pdoConnect->prepare($pdoQuery);
	$pdoresult->execute();
	header('location:userman.php');

	$pdoconnect = null;  
?>