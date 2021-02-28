<?php  
include_once './includes/connect.php';
include 'header.php';


if (!empty($_POST["edit"])) {

	$pdoQuery=$pdoConnect->prepare("update users set name = '" . $_POST['name'] . "' , password = '" . $_POST['password'] . "', email = '" . $_POST['email'] . "',status= '" . $_POST['status'] . "'  where id = " . $_GET["id"]);
	$pdoResult = $pdoQuery->execute();
		if ($pdoResult) {
			header('location:userman.php');
		}
}
	$pdoQuery = $pdoConnect->prepare("SELECT * FROM users where id=" . $_GET["id"]);
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
		<p>Username:</p> <input type="text" name="name" value="<?php echo $pdoResult[0]['name']; ?>" required placeholder ="UserName"><br><br>
		<p>Password:</p> &nbsp;<input type="password" name="password" value="<?php echo $pdoResult[0]['password']; ?>" required placeholder="password"><br><br>
		<p>Email:</p> <input type="text" name="email" value="<?php echo $pdoResult[0]['email']; ?>" required placeholder="email"
		><br><br>
		<p>User Level:</p> <input type="text" name="status" value="<?php echo $pdoResult[0]['status']; ?>" required placeholder="status">
		<br><br>
		<input type="submit" name="edit" value="      Update     ">
		<a href="userman.php"><input type="button" name="edit" value="      Cancel     "></a>

	</form>
	<br>
</body>
</html>

<?php
include 'footer.php';
?>