<?php  
include_once './includes/connect.php';
include 'header.php';

if (!empty($_POST["edit"])) {

	$pdoQuery=$pdoConnect->prepare("update tblcustomers set name = '" . $_POST['name'] . "' , address = '" . $_POST['address'] . "', number = '" . $_POST['number'] . "',level= '" . $_POST['level'] . "'  where id = " . $_GET["id"]);
	$pdoResult = $pdoQuery->execute();
		if ($pdoResult) {
			header('location:customerpage.php');
		}
}
	$pdoQuery = $pdoConnect->prepare("SELECT * FROM tblcustomers where id=" . $_GET["id"]);
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
		<p>Name:</p> <input type="text" name="name" value="<?php echo $pdoResult[0]['name']; ?>" required placeholder ="Name"><br><br>
		<p>Address:</p> &nbsp;<input type="password" name="address" value="<?php echo $pdoResult[0]['address']; ?>" required placeholder="Address"><br><br>
		<p>Contact Number:</p> <input type="text" name="number" value="<?php echo $pdoResult[0]['number']; ?>" required placeholder="Number"
		><br><br>
		<p>Level:</p> <input type="text" name="level" value="<?php echo $pdoResult[0]['level']; ?>" required placeholder="Level">
		<br><br>
		<input type="submit" name="edit" value="      Update     ">
		<a href="customerpage.php"><input type="button" name="edit" value="      Cancel     "></a>

	</form>
	<br>
</body>
</html>

<?php 
include 'footer.php';
 ?>