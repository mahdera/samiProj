<?php
	session_start();
	$id = $_POST['id'];
	$q61Value = $_POST['q61Value'];	
	require_once 'form6.php';
	updateForm6($id, $q61Value, $_SESSION['LOGGED_USER_ID']);	
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form6 Updated Successfully!</div>