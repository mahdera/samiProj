<?php
	session_start();
	$id = $_POST['id'];
	$q41Value = $_POST['q41Value'];	
	require_once 'form4.php';
	updateForm4($id, $q41Value, $_SESSION['LOGGED_USER_ID']);	
?>
<p style='background:lightgreen'>Form4 Updated Successfully!</p>