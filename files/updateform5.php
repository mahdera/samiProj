<?php
	session_start();
	$id = $_POST['id'];
	$q51Value = $_POST['q51Value'];	
	require_once 'form5.php';
	updateForm5($id, $q51Value, $_SESSION['LOGGED_USER_ID']);	
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form5 Updated Successfully!</div>