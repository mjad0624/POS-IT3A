<?php
include_once './includes/connect.php';

$productname = $_POST['name'];
$productprice = $_POST['price'];
$productid = $_POST['code'];
$productqty = $_POST['qty'];
$producttotal = $_POST['total'];




$pdoQuery = "INSERT INTO tblsales VALUES (:productid,:productname,:productprice,:productqty,:producttotal)";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array(":productid"=>$productid,":productname"=>$productname,":productprice"=>$productprice,":productqty"=>$productqty,"producttotal"=>$producttotal));

?>