<?php
	$id = $_GET['id'];
	require_once 'form4.php';
	deleteForm4($id);
	require 'showlistofform4records.php';
?>