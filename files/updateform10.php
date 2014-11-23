<?php
	session_start();
	$id = $_POST['id'];
	@$q101Value = mysql_real_escape_string($_POST['q101Value']);	
	require_once 'form10.php';
	updateForm10($id, $q101Value, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form10 Updated Successfully!</div>
