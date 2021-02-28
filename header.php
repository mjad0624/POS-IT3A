<?php
include_once './includes/connect.php';
session_start();
redirect();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/header.css">
	
	<script src="https://kit.fontawesome.com/afe39b4bfe.js" crossorigin="anonymous"></script>

	
	
</head>
<header style="height: 60px;">
<div class="hcontainer">

	<?php 
	echo '<h1>Welcome-'.$_SESSION["name"].'</h1>';
	?>	

	
<ul>
 	
	<li>	<a href="adminpanel.php">Home</a></li>
	<li>	<a href="about.php">About</a></li>
	<li>	<a href="contacts.php">Contact Us</a></li>
	<li>	<a href="logout.php"><button>Logout</button></a></li>
	
</ul>	

</div>
</header>



