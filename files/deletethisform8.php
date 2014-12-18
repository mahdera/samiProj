<?php
	$id = $_GET['id'];
	require_once 'form8.php';
	deleteForm8($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
