<?php
	error_reporting( 0 );
	$email = $_GET['email'];
	require_once 'files/user.php';
	activateUserAccountUsingEmail($email);
	//after that redirect user to the login page of our application so that
	//the user can log into the system.
	header("Location: login.php");
?>
