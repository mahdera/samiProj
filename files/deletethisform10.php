<?php
	$id = $_GET['id'];
	require_once 'form10.php';
	deleteForm10($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
