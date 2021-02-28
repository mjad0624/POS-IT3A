
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
			<a href="searchproducts.php"><input type="submit" name="clear" value="Search Here:" style="width: 100%; padding: 3px; background-color: #000; color: #fff;"></a>
	<h1 style="padding-top:15px;">Input Here</h1>
	<form action="productpage.php" method="post" class="usersform">
		<input type="hidden" name="id">
		
		<p>Product Name:</p> <input type="text" name="name" required placeholder ="Name"><br><br>
		<p>Product Code:</p> <input type="text" name="code" required placeholder="Code"><br><br>
		<p>Product Price:</p> &nbsp;<input type="text" name="price" required placeholder="Price"><br><br>
		<p>Product Quantity:</p> <input type="text" name="quantity" required placeholder="Quantity"><br><br>

		<select name="supplier" required>
			echo "<option value = ''>Suppliers</option>";
			<?php  
			$pdoQuery = 'SELECT name FROM tblsuppliers';
			$pdoResult = $pdoConnect->prepare($pdoQuery);
			$pdoResult->execute();
			
			while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
				echo "<option value='$name'>$name</option>";
			}
			?>
		</select>
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
	$pdoQuery = 'SELECT * FROM tblproducts';
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoResult->execute();
		echo "<table cellpadding='10'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Name</th>";
		echo "<th>Code</th>";
		echo "<th>Price</th>";
		echo "<th>Quantity</th>";
		echo "<th>Supplier</th>";
		if(!isemployee()){
		echo "<th>Action</th>";
	}
		echo "</tr>";

	while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$productname</td>";
		echo "<td>$product_code</td>";
		echo "<td>$price</td>";
		echo "<td>$prod_quantity</td>";
		echo "<td>$prod_supplier</td>";
		if(!isemployee()){
		echo "<td>
				<a href='editproducts.php?id=$id';?><input type='submit' name='btnedit' value = 'Edit'></a>
				<a href='delproducts.php?id=$id';?><input type='submit' name='btndel' value = 'Delete'</a>
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
	$productname = $_POST['name'];
	$product_code = $_POST['code'];
	$price = $_POST['price'];
	$prod_quantity = $_POST['quantity'];
	$prod_supplier = $_POST['supplier'];
	//insert Query
	$pdoQuery = "INSERT INTO `tblproducts`(`productname`,`product_code`,`price`, `prod_quantity`,`prod_supplier`) VALUES (:productname,:product_code,:price,:prod_quantity,:prod_supplier)";
	$pdoResult = $pdoConnect->prepare($pdoQuery);
	$pdoExec = $pdoResult->execute(array(":productname"=>$productname,":product_code"=>$product_code,":price"=>$price,":prod_quantity"=>$prod_quantity,":prod_supplier"=>$prod_supplier));
	if($pdoExec)
	{
		$pdoQuery = 'SELECT * FROM tblproducts';
		$pdoResult = $pdoConnect->prepare(pdoQuery);
		$pdoResult->execute();
			while($row = $pdoResult->fetch()){			
				echo $row['id'] ."|". $row['productname'] ."|". $row['product_code'] ."|". $row['product_price'] ."|". $row['prod_quantity'] ."|".$row['prod_supplier'] ."|"."<br/>";
			}
			header("Location:productpage.php");
			exit;
	}else{
			echo 'Data not Inserted';
	}
}
include 'footer.php';
?>

</html>