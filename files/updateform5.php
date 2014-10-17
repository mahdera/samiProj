<?php
	session_start();
	$id = $_POST['id'];
	$q51Value = $_POST['q51Value'];	
	require_once 'form5.php';
	updateForm5($id, $q51Value, $_SESSION['LOGGED_USER_ID']);	
?>
<p style='background:lightgreen'>Form5 Updated Successfully!</p>