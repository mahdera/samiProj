<?php
	$id = $_GET['id'];
	require_once 'form1.php';
	deleteForm1($id);
	require 'showlistofform1records.php';
?>