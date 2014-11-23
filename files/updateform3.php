<?php
	session_start();
	$id = $_POST['id'];
	@$q31Value = mysql_real_escape_string($_POST['q31Value']);	
	require_once 'form3.php';
	updateForm3($id, $q31Value, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form3 Updated Successfully!</div>
