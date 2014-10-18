<?php
	session_start();
	$id = $_POST['id'];
	$q71Value = $_POST['q71Value'];	
	require_once 'form7.php';
	updateForm7($id, $q71Value, $_SESSION['LOGGED_USER_ID']);	
?>
<p style='background:lightgreen'>Form7 Updated Successfully!</p>