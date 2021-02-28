<?php
include_once './includes/connect.php';
session_start();
$message = '<label>All Fields are Required</label>';
			
try 
{
	$pdoConnect = new pdo("mysql:host=localhost;dbname=website","root","");
	$pdoConnect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['btnlogin']))
	{
		if (empty($_POST["name"])||empty($_POST["password"])) 
		{
			header("location:login.php?error=1");
			
		}
		else
		{
			$pdoQuery = "SELECT * FROM users WHERE name = :name AND password = :password";
			$pdoResult = $pdoConnect->prepare($pdoQuery);
			$pdoResult->execute(array('name'=>$_POST["name"],'password'=>$_POST["password"]	));
			$get=$pdoResult->fetch(PDO::FETCH_ASSOC);
			extract($get);
			$count = $pdoResult->rowCount();

			

			if ($count > 0) 
			{
				$_SESSION["name"] = $_POST["name"];
				$_SESSION["status"] = $status;
				$_SESSION["loggedin"] = 2;	
				header("location:./adminpanel.php");
			}
			else
			{
				header("location:login.php?error=1");
			}
		}
	}	
}catch (PDOexception $exc) {
	echo $exc->getmessage();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	
		<link rel="stylesheet" type="text/css" href="css/login.css">

				
	
		<div class="login">
		<img src="img/avatar.jpg" class="avatar">
		<h1>Login Here </h1>
		

			<form action="login.php" method="post" class="loginform">

				<p>Username</p>
				<input type="text" name="name" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password">
				<input type="submit" name="btnlogin" value="Login">
				<br>
				<?php
				if (isset($_GET['error'])==true) {
					echo '<font color = "#ff000">Invalid Username / Password</font>';	
				}
				 ?>
				 <br>
				 <a href="#">Forgot Password</a>
			
			</form>

		</div>
		
</body>
</html>