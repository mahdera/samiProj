<?php
	session_start();
	$id = $_POST['id'];
	$q31Value = $_POST['q31Value'];	
	require_once 'form3.php';
	updateForm3($id, $q31Value, $_SESSION['LOGGED_USER_ID']);	
?>
<p style='background:lightgreen'>Form3 Updated Successfully!</p>