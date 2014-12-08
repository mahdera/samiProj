<?php
	$id = $_GET['id'];
	require_once 'form5.php';
	deleteForm5($id);
	require 'showlistofform5records.php';
?>
