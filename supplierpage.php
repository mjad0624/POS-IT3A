
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
			<a href="searchsupplier.php"><input type="submit" name="clear" value="Search Here:" style="width:100%; padding: 5px; background-color: #000; color: #fff;"></a>
	<h1>Input Here</h1>
	<form action="supplierpage.php" method="post" class="usersform">
		<input type="hidden" name="id">
		
		<p>Name:</p> <input type="text" name="name" required placeholder ="Supplier Name"><br><br>
		<p>Address:</p> &nbsp;<input type="text" name="address" required placeholder="Address"><br><br>
		<p>Contact Number:</p> <input type="text" name="number" required placeholder="Contact Number"><br><br>
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
	$pdoQuery = 'SELECT * FROM tblsuppliers';
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
		echo "<table cellpadding='10'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Supplier Name</th>";
		echo "<th>Address</th>";
		echo "<th>Contact Number</th>";
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
		echo "<td>$contact_number</td>";
		if(!isemployee()){
		echo "<td>
				<a href='editsup.php?id=$id';?><input type='submit' name='btnedit' value = 'Edit'></a>
				<a href='delsup.php?id=$id';?><input type='submit' name='btndel' value = 'Delete'</a>
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
	$contact_number = $_POST['number'];
	
	//insert Query
	$pdoQuery = "INSERT INTO `tblsuppliers`(`name`,`address`,`contact_number`) VALUES (:name,:address,:contact_number)";
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoExec = $pdoResult->execute(array(":name"=>$name,":address"=>$address,":contact_number"=>$contact_number));

	if($pdoExec)
	{
		$pdoQuery = 'SELECT * FROM tblsuppliers';
		$pdoResult = $pdoConnect->prepare(pdoQuery);
		$pdoResult->execute();
			while($row = $pdoResult->fetch()){			
				echo $row['id'] ."|". $row['name'] ."|". $row['address'] ."|". $row['contact_number'] ."|". "<br/>";
			}
			header("Location:supplierpage.php");
			exit;
	}else{
			echo 'Data not Inserted';
	}
}
include 'footer.php';
?>

</html>