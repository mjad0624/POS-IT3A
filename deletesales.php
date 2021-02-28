<?php
include_once './includes/connect.php';


$productprice = $_POST['price'];
$productid = $_POST['code'];
$productqty = $_POST['qty'];


$pdoQuery = "DELETE From tblsales where productid = " .$productid. " AND productprice = " .$productprice." AND productqty = ".$productqty;
	$pdoresult = $pdoConnect->prepare($pdoQuery);
	$pdoresult->execute();

?>