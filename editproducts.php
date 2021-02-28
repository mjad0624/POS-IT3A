<?php  
include_once './includes/connect.php';
include 'header.php';

if (!empty($_POST["edit"])) {

	$pdoQuery=$pdoConnect->prepare("update tblproducts set productname = '" . $_POST['name'] . "' , product_code = '" . $_POST['code'] . "', price = '" . $_POST['price'] . "',prod_quantity= '" . $_POST['quantity'] . "',prod_supplier = '" . $_POST['supplier'] . "' where id = " . $_GET["id"]);
	$pdoResult = $pdoQuery->execute();
		if ($pdoResult) {
			header('location:productpage.php');
		}
}
	$pdoQuery = $pdoConnect->prepare("SELECT * FROM tblproducts where id=" . $_GET["id"]);
	$pdoQuery->execute();
	$pdoResult = $pdoQuery->fetchall();
	$pdoConnect = null;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modify Data</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/edit.css">
</head>
<body>
	<br>
	<form action="" method="post" class="signup">
		<p>Product Name:</p> <input type="text" name="name" value="<?php echo $pdoResult[0]['productname']; ?>" required placeholder ="Name"><br><br>
		<p>Product Code:</p> &nbsp;<input type="text" name="code" value="<?php echo $pdoResult[0]['product_code']; ?>" required placeholder="Code"><br><br>
		<p>Product Price:</p> <input type="text" name="price" value="<?php echo $pdoResult[0]['price']; ?>" required placeholder="Price"
		><br><br>
		<p>Product Quantity:</p> <input type="text" name="quantity" value="<?php echo $pdoResult[0]['prod_quantity']; ?>" required placeholder="Quantitty">
		<br><br>
		<p>Product Supplier:</p> <input type="text" name="supplier" value="<?php echo $pdoResult[0]['prod_supplier']; ?>" required placeholder ="Supplier"><br><br>
		<input type="submit" name="edit" value="Update">
		<a href="productpage.php"><input type="button" name="edit" value="Cancel"></a>

	</form>
	<br>
</body>
</html>

<?php
include 'footer.php';
?>