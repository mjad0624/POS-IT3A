<?php
include_once './includes/connect.php';

$productname = $_POST['name'];
$productprice = $_POST['price'];
$productid = $_POST['code'];
$productqty = $_POST['qty'];
$producttotal = $_POST['total'];
$trans_code = $_POST['trans'];



$pdoQuery = "INSERT INTO tblsales VALUES (:productid,:productname,:productprice,:productqty,:producttotal,:trans_code)";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array(":productid"=>$productid,":productname"=>$productname,":productprice"=>$productprice,":productqty"=>$productqty,"producttotal"=>$producttotal,"trans_code"=>$trans_code)); 

?>