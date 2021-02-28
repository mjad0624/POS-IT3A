<?php  
include_once './includes/connect.php';
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add and display</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/search.css">
</head>
<body style="padding-top: 80px; padding-bottom: :100px; ">
	<br>
	<div class="searchcontain">
	<form action="searchuser.php" method="post">
		Search:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="Enter Data Here"><br><br>
		<span><input type="submit" name="find"value="Search"></span>
		<a href="userman.php"><input type="button" name="clear" value="Cancel"></a>
	</form>
	<div>
	
	</div>
	</div>		
	<br>

<div class = "table">
<?php
	$pdoQuery = 'SELECT * FROM users';
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
		echo "<table border='2' cellpadding='7'>";
		echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Name</th>";
		echo "<th>Password</th>";
		echo "<th>Email</th>";  
		echo "<th>Status</th>";
		echo "<th>Action</th>";
		echo "</tr>";
	while ($row=$pdoResult->Fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$name</td>";
		echo "<td>$password</td>";
		echo "<td>$email</td>";  
		echo "<td>$status</td>";
		echo "<td>
				<a href='edituser.php?id=$id';?><input type='submit' name='btnedit' value = 'Edit'></a>
				<a href='deluser.php?id=$id';?><input type='submit' name='btndel' value = 'Delete'</a>";

		echo "</tr>";
	}
?>
</div>

<div class="searchedtable">
	<?php  
//search data in mysql using pdo
//set data in input text

$id = "";
$name = "";
$email = "";
$password = "";
$status = "";

if(isset($_POST['find']))
{

	//connect to mysql
		try{
	$pdoConnect = new pdo("mysql:host=localhost;dbname=website","root","");	
	//var_dump($pdoConnect);	
	}catch(PDOExeption $exc){
		echo $exc->getmessage();
		exit();
	}
	//id to search
	$name = $_POST['name'];
	//myssql search query
	$pdoQuery = "SELECT * FROM users Where name = :name";
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	//set your id to query id
	$pdoExec = $pdoResult->execute(array(':name'=>$name));
		if ($pdoExec) {


			//if id exist show data input
			if ($pdoResult->rowCount()>0) {
				echo"<table border='2' cellpadding ='7'>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Email</th>";
				echo "<th>Password</th>";
				echo "<th>Status</th>";
				echo "<th>Action</th>";
				echo "</tr>";
			while ($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$name</td>";
				echo "<th>$email</th>";
				echo "<th>$password</th>";
				echo "<td>$status</td>";
				echo "<td><a href = 'edituser.php?id=$id';>Edit</a><a href = deluser.php?id=$id';?>Delete</a></td>";
				echo "</tr>";
			}
		
		}else{
			echo"<br><br><br><br>";
			echo "No Data";
		}
		}
}
$pdoconnect=null;
?>
</div>

<?php
include 'footer.php';
?>
</body>
</html>

