<?php
	$id = $_GET['id'];
	require_once 'form6.php';
	deleteForm6($id);
	require 'showlistofform6records.php';
?>
