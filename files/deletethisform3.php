<?php
	$id = $_GET['id'];
	require_once 'form3.php';
	deleteForm3($id);
	require 'showlistofform3records.php';
?>
