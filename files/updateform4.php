<?php
	session_start();
	$id = $_POST['id'];
	@$q41Value = mysql_real_escape_string($_POST['q41Value']);	
	require_once 'form4.php';
	updateForm4($id, $q41Value, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form4 Updated Successfully!</div>
