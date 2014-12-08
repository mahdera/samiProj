<?php
	$id = $_GET['id'];
	require_once 'form2.php';
	deleteForm2($id);
	require 'showlistofform2records.php';
?>
