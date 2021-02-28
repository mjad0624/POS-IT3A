<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " .$con->connect_error);
}

$pro_code = $_POST["procode"];
$stmt = $conn->prepare("SELECT id, product_code, productname, price FROM tblproducts WHERE product_code = ?");
$stmt->bind_param("s",$pro_code);
$stmt->bind_result($id,$product_code,$productname,$price); 

if($stmt->execute()){
	while($stmt->fetch()){
		$output[] = array("id"=>$id,"product_code"=>$product_code,"productname"=>$productname,"price"=>$price);
	}
	echo json_encode($output);
}

?>