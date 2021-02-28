<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="css/signup.css">

<div class="signup">

	<img src="img/avatar.jpg" class="avatar">
	<h1>Sign up Here</h1>

	<form action="add.php" method="post" class="signupform">
		<p>Email</p>
		<input type="Text" name="email" placeholder="Enter Email">
		<p>Username</p>
		<input type="Text" name="name" placeholder="Enter Username">
		<p>Password</p>
		<input type="Password" name="password" placeholder="Enter Password">
		<p>Security Level</p>
		<input type="text" name="seclevel" placeholder="Enter Level">
		<input type="submit" name="insert" value="Create Account">
		<input type="submit" name="cancel" value="Cancel">
	</form>

</div>

</body>

</html>