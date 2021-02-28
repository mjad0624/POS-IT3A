
<!DOCTYPE html>
<html>

<?php    
include_once './includes/connect.php';
include'header.php'
//connection,input part
?>

	<head>
	<title> Add and Display</title>
	<link rel="stylesheet" type="text/css" href="./css/buttons.css">
	</head>
<body style="padding-bottom: 100px; padding-top: 60px;" >
	<div class="container">

	<div class="form">
					<a href="searchuser.php"><input type="submit" name="clear" value="Search Here:" style="width: 100%; padding: 5px; background-color: #000; color: #fff;"></a>
	<h1>Input Here</h1>
	<form action="userman.php" method="post" class="usersform">
		<input type="hidden" name="id">
		
		<p>Username:</p> <input type="text" name="name" required placeholder ="Username"><br><br>
		<p>Password:</p> &nbsp;<input type="password" name="password" required placeholder="Password"><br><br>
		<p>Email:</p> <input type="text" name="email" required placeholder="Email"><br><br>
		<p>User Level:</p> <input type="text" name="status" required placeholder="Level"><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span><input type="submit" name="insert" value="Add"></span>
		<span><input type="submit" name="clear" value="Clear"></span>
		</form>
		
		</div>
	<br>

<!--table show user-->
<div class="table">
	<?php  
	$pdoQuery = 'SELECT * FROM users';
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
		echo "<table cellpadding='10'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Username</th>";
		echo "<th>Password</th>";
		echo "<th>Email</th>";
		echo "<th>Level</th>";
		echo "<th>Action</th>";
		echo "</tr>";

	while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$name</td>";
		echo "<td>$password</td>";
		echo "<td>$email</td>";
		echo "<td>$status</td>";
		echo "<td>
				<a href='edituser.php?id=$id';?><input type='submit' name='btnedit' value = 'Edit'></a>
				<a href='deluser.php?id=$id';?><input type='submit' name='btndel' value = 'Delete'</a>
				</td>";
		echo "</tr>";
	}
	?>
</div>
</span>
</body>





<?php
//search 

// insert to database part
if(isset($_POST['insert']))
{

	try{
	$pdoConnect = new pdo("mysql:host=localhost;dbname=website","root","");	
	//var_dump($pdoConnect);	
	}catch(PDOExeption $exc){
		echo $exc->getmessage();
		exit();
	}
		// gets value from the page
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	//insert Query
	$pdoQuery = "INSERT INTO `users`(`name`,`email`,`password`, `status`) VALUES (:name,:email,:password,:status)";
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoExec = $pdoResult->execute(array(":name"=>$name,":email"=>$email,":password"=>$password,":status"=>$status));

	if($pdoExec)
	{
		$pdoQuery = 'SELECT * FROM users';
		$pdoResult = $pdoConnect->prepare(pdoQuery);
		$pdoResult->execute();
			while($row = $pdoResult->fetch()){			
				echo $row['id'] ."|". $row['name'] ."|". $row['email'] ."|". $row['password'] ."|". $row['status'] ."|"."<br/>";
			}
			header("Location:userman.php");
			exit;
	}else{
			echo 'Data not Inserted';
	}
}

include 'footer.php';
?>

</html>