<?php
include_once './includes/connect.php';


$productprice = $_POST['price'];
$productid = $_POST['code'];
$productqty = $_POST['qty'];
$trans_code = $_POST['trans'];


$pdoQuery = "DELETE From tblsales where productid = " .$productid. " AND productprice = " .$productprice." AND productqty = ".$productqty." AND trans_code = ".$trans_code;
	$pdoresult = $pdoConnect->prepare($pdoQuery);
	$pdoresult->execute();

?>