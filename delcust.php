<?php
require_once("./includes/connect.php");

	$pdoQuery = "DELETE From tblcustomers where id = " . $_GET['id'];
	$pdoresult = $pdoConnect->prepare($pdoQuery);
	$pdoresult->execute();
	header('location:customerpage.php');

	$pdoconnect = null;  
?>