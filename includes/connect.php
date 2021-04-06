<?php 
try {
	$pdoConnect = new pdo("mysql:host=localhost;dbname=website","root","");
	$pdoConnect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOexception $exc) {
	echo $exc->getmessage();
}


define('ADMIN_LEVEL', '1');
define('MANAGER_LEVEL','2');
define('EMPLOYEE_LEVEL', '3');

function isadmin(){
	if(isset($_SESSION['status'])&& ADMIN_LEVEL == $_SESSION['status']){
		return true;
	}else{
		return false;
	}
}


function isemployee(){
	if(isset($_SESSION['status'])&&$_SESSION['status']&& EMPLOYEE_LEVEL == $_SESSION['status']){
		return true;
	}else{
		return false;
	}
}

function ismanager(){
	if(isset($_SESSION['status'])&&$_SESSION['status']&& MANAGER_LEVEL == $_SESSION['status']){
		return true;
	}else{
		return false;
	}
}


function islogin(){
	if (( isset( $_SESSION['loggedin'] ) && $_SESSION['loggedin'] ) && ( isset( $_SESSION['status'] ) && $_SESSION['status'] )){
		return true;
	}else{
		return false;
	}
}

function redirect(){
if (!islogin()) { 
			header( 'location: login.php' );
		}
}

function get_trans(){
		$pdoQuery = 'SELECT MAX(trans_code) FROM `tblsales`';
		$pdoResult = $pdoConnect->prepare($pdoQuery);
		$pdoResult->execute();
		$trans=$pdoResult->fetch(PDO::FETCH_ASSOC);
		return $trans;
}

