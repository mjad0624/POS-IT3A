<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/sales record.css">
</head>
<body>

<?php
include_once './includes/connect.php';
include 'header.php';
$netprofit = 0;


try{
	$pdoConnect = new pdo("mysql:host=localhost;dbname=website","root","");	
	//var_dump($pdoConnect);	
	}catch(PDOExeption $exc){
		echo $exc->getmessage();
		exit();
	}
		

$pdoQuery = "SELECT `productid`,`productname`,`productprice`, SUM(`productqty`) `quantity` FROM `tblsales` GROUP BY `productname`";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoResult->execute();
?>
<div id="salesrecord">
	<div id="tabledata">
		<?php 
		echo "<table cellpadding = '10'>";
				echo "<tr>";
				echo "<th style = 'border:1px solid #000';>Product Code</th>";
				echo "<th style = 'border:1px solid #000'>Product Name</th>";
				echo "<th style = 'border:1px solid #000'>Product Price</th>";
				echo "<th style = 'border:1px solid #000'>Product Quantity</th>";
				echo "<th style = 'border:1px solid #000'>Cost</th>";
				echo "</tr>";
			while ($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
				$total = $quantity * $productprice;
				$netprofit = $netprofit+$total;
				$grossprofit = ($netprofit/100)*95;
				echo "<tr>";
				echo "<td style = 'text-align:left';>$productid</td>";	
				echo "<td>$productname</td>";
				echo "<td>$productprice</td>";
				echo "<td>$quantity</td>";
				echo "<td>$total</td>";
				echo "</tr>";	
			}
		?>
	</div>
	<div id = "tablenumbers">
		
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<th style="text-align: right; background-color: #2EFEF7; font-size:12px;">Net</th>
			<td style="text-align: left; background-color: #2EFEF7; font-size:12px;">

				<?php echo "$netprofit"; ?>
			
			</td>
		</tr>
		<tr>"
			<td></td>
			<td></td>
			<td></td>
			<th style="text-align: right; background-color: #2EFEF7; font-size:12px;">Vat</th>"
			<td style="text-align: left; background-color: #2EFEF7; font-size:12px;">5%</td>"
		</tr>"
		<tr>"
			<td></td>
			<td></td>
			<td></td>
			<th style="text-align: right; background-color: #2EFEF7; font-size:12px; ">Gross</th>"
			<td style="text-align: left; background-color: #2EFEF7; font-size:12px;">

				<?php echo "$grossprofit"; ?>
				
			</td>"
		</tr>"

	</div>
</div>
	<?php  
			include 'footer.php';
	?>
</body>
</html>