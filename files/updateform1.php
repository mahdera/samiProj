<?php
	session_start();
	$titleValue = $_POST['titleValue'];
	$dateValue = $_POST['dateValue'];
    $planValue = $_POST['planValue'];
    $q1Value = $_POST['q1Value'];
    $q2Value = $_POST['q2Value'];
	$id = $_POST['id'];

	require_once 'form1.php';	
	updateForm1($id, $titleValue, $dateValue, $planValue, $q1Value, $q2Value, $_SESSION['LOGGED_USER_ID'])
?>
<p style='background:lightgreen'>Form1 Updated Successfully!</p>