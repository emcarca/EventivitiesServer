<?php
include_once('login.php');
$login = new Login();

if(isset($_POST["username"]) and (isset($_POST["password"]))){
	$user = $_POST["username"];
	$pass = $_POST["password"];
	echo $login->getJSONLogin($user, $pass);
}
?>