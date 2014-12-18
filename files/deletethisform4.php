<?php
	$id = $_GET['id'];
	require_once 'form4.php';
	deleteForm4($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
