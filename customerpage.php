
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
	<a href="searchcust.php"><input type="submit" name="clear" value="Search Here:" style="width: 100%; padding: 3px; background-color: #000; color: #fff;"></a>
	<h1 style="padding-top:25px;">Input Here</h1>
	<form action="customerpage.php" method="post" class="usersform">
		<input type="hidden" name="id">
		
		<p>Name:</p> <input type="text" name="name" required placeholder ="Name"><br><br>
		<p>Number:</p> <input type="text" name="number" required placeholder="number"><br><br>
		<p>Address:</p> &nbsp;<input type="text" name="address" required placeholder="address"><br><br>
		<p>Level:</p> <input type="text" name="level" required placeholder="level"><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php if(!isemployee()){?>
			<span><input type="submit" name="insert" value="Add"></span>
			<span><input type="submit" name="clear" value="Clear"></span>
		<?php } ?>
	</form>
		</div>
	<br>

<!--table show user-->
<div class="table">
	<?php  
	$pdoQuery = 'SELECT * FROM tblcustomers';
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
		echo "<table cellpadding='10'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Name</th>";
		echo "<th>Address</th>";
		echo "<th>Contact Number</th>";
		echo "<th>Level</th>";
		if(!isemployee()){
		echo "<th>Action</th>";
	}
		echo "</tr>";

	while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$name</td>";
		echo "<td>$address</td>";
		echo "<td>$number</td>";
		echo "<td>$level</td>";
		if(!isemployee()){
		echo "<td>
				<a href='editcust.php?id=$id';?><input type='submit' name='btnedit' value = 'Edit'></a>
				<a href='delcust.php?id=$id';?><input type='submit' name='btndel' value = 'Delete'</a>
				</td>";
		echo "</tr>";
	}
	}
	?>
</div>
</span>
</body>




<?php
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
	$address = $_POST['address'];
	$contact = $_POST['number'];
	$number  = $_POST['number'];
	$level = $_POST['level'];
	//insert Query
	$pdoQuery = "INSERT INTO `tblcustomers`(`name`,`address`,`number`, `level`)VALUES(:name,:address,:contact,:level)";
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoExec = $pdoResult->execute(array(":name"=>$name,":address"=>$address,":contact"=>$number,":level"=>$level));
	if($pdoExec)
	{
		$pdoQuery = 'SELECT * FROM tblcustomers';
		$pdoResult = $pdoConnect->prepare(pdoQuery);
		$pdoResult->execute();
			while($row = $pdoResult->fetch()){			
				echo $row['id'] ."|". $row['name'] ."|". $row['address'] ."|". $row['number'] ."|". $row['level'] ."|"."<br/>";
			}
			header("Location:customerpage.php");
			exit;
	}else{
			echo 'Data not Inserted';
	}
}
include 'footer.php';
?>

</html>