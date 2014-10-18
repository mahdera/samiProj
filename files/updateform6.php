<?php
	session_start();
	$id = $_POST['id'];
	$q61Value = $_POST['q61Value'];	
	require_once 'form6.php';
	updateForm6($id, $q61Value, $_SESSION['LOGGED_USER_ID']);	
?>
<p style='background:lightgreen'>Form6 Updated Successfully!</p>