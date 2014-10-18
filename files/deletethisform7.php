<?php
	$id = $_GET['id'];
	require_once 'form7.php';
	deleteForm7($id);
	require 'showlistofform7records.php';
?>