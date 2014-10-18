<?php
	$id = $_GET['id'];
	require_once 'form10.php';
	deleteForm10($id);
	require 'showlistofform10records.php';
?>