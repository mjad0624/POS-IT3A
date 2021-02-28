<?php  
include_once './includes/connect.php';
include 'header.php';


if (!empty($_POST["edit"])) {

	$pdoQuery=$pdoConnect->prepare("update tblsuppliers set name = '" . $_POST['name'] . "' , address = '" . $_POST['address'] . "', contact_number = '" . $_POST['contact_number'] . "' where id = " . $_GET["id"]);
	$pdoResult = $pdoQuery->execute();
		if ($pdoResult) {
			header('location:supplierpage.php');
		}
}
	$pdoQuery = $pdoConnect->prepare("SELECT * FROM tblsuppliers where id=" . $_GET["id"]);
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
		<p>Supplier Name:</p> <input type="text" name="name" value="<?php echo $pdoResult[0]['name']; ?>" required placeholder ="Name"><br><br>
		<p>Address:</p> &nbsp;<input type="text" name="address" value="<?php echo $pdoResult[0]['address']; ?>" required placeholder="Address"><br><br>
		<p>Contact Number:</p> <input type="text" name="contact_number" value="<?php echo $pdoResult[0]['contact_number']; ?>" required placeholder="Contact Number"><br><br>
		<input type="submit" name="edit" value="      Update     ">
		<a href="supplierpage.php"><input type="button" name="edit" value="      Cancel     "></a>

	</form>
	<br>
</body>
</html>
<?php
include 'footer.php';
?>