<?php
	session_start();
	$id = $_POST['id'];
	$q21Value = $_POST['q21Value'];
	$q22Value = $_POST['q22Value'];
	$q23Value = $_POST['q23Value'];
	$q24Value = $_POST['q24Value'];
	require_once 'form2.php';
	updateForm2($id, $q21Value, $q22Value, $q23Value, $q24Value, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form2 Updated Successfully!</div>