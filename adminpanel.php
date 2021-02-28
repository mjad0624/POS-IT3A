<?php include 'header.php';?>
<body>
<link rel="stylesheet" type="text/css" href="css/index.css">
<div class = "container">
	<a href="sales.php" class="a1">
		<button style="margin:3px;"><i class="fas fa-cash-register"></i><br>Cash Register</button>
	</a>
	<a href="productpage.php" class="a2">
		<button style="margin:3px;"><i class="fab fa-product-hunt"></i><br>Products</button>
	</a>
	<a href="supplierpage.php" class="a3">
		<button style="margin:3px;"><i class="fas fa-parachute-box"></i><br>Suppliers</button>
	</a>
	<a href="customerpage.php" class="a4">
		<button style="margin:3px;"><i class="fas fa-male"></i><br>Customers</button>
	</a>
	<a href="salesrecord.php" class="a5">
		<button style="margin:3px;"><i class="fas fa-dollar-sign"></i><br>Sales</button>
	</a>
	<?php if (isadmin()): ?>

	<a href="userman.php"  class="a6">
		<button style="margin:3px;"><i class="fas fa-users"></i><br>User Manager</button>
	</a>
	
	<?php endif;  ?>

</div>

</body>

<?php include 'footer.php';
?>