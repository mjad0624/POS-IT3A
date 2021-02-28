<?php
require_once("./includes/connect.php");

	$pdoQuery = "DELETE From tblproducts where id = " . $_GET['id'];
	$pdoresult = $pdoConnect->prepare($pdoQuery);
	$pdoresult->execute();
	header('location:productpage.php');

	$pdoconnect = null;  
?>