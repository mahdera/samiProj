<?php
	$id = $_GET['id'];
	require_once 'form8.php';
	deleteForm8($id);
	require 'showlistofform8records.php';
?>
