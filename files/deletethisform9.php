<?php
	$id = $_GET['id'];
	require_once 'form9.php';
	deleteForm9($id);
	require 'showlistofform9records.php';
?>
