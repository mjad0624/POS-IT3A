<?php
require_once("./includes/connect.php");

	$pdoQuery = "DELETE From tblsuppliers where id = " . $_GET['id'];
	$pdoresult = $pdoConnect->prepare($pdoQuery);
	$pdoresult->execute();
	header('location:supplierpage.php');

	$pdoconnect = null;  
?>