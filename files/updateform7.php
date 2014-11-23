<?php
	session_start();
	$id = $_POST['id'];
	$q71Value = mysql_real_escape_string($_POST['q71Value']);	
	require_once 'form7.php';
	updateForm7($id, $q71Value, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form7 Updated Successfully!</div>
