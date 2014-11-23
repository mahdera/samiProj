<?php
	session_start();
	$id = $_POST['id'];
	$q81Value = mysql_real_escape_string($_POST['q81Value']);	
	require_once 'form8.php';
	updateForm8($id, $q81Value, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form8 Updated Successfully!</div>
