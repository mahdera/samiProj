<?php
	session_start();
	$id = $_POST['id'];
	$q81Value = $_POST['q81Value'];	
	require_once 'form8.php';
	updateForm8($id, $q81Value, $_SESSION['LOGGED_USER_ID']);	
?>
<p style='background:lightgreen'>Form8 Updated Successfully!</p>