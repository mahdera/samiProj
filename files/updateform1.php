<?php
	session_start();
	$titleValue = mysql_real_escape_string($_POST['titleValue']);
	$dateValue = $_POST['dateValue'];
  @$planValue = mysql_real_escape_string($_POST['planValue']);
  @$q1Value = mysql_real_escape_string($_POST['q1Value']);
  @$q2Value = mysql_real_escape_string($_POST['q2Value']);
	$id = $_POST['id'];

	require_once 'form1.php';
	updateForm1($id, $titleValue, $dateValue, $planValue, $q1Value, $q2Value, $_SESSION['LOGGED_USER_ID'])
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form1 Updated Successfully!</div>
