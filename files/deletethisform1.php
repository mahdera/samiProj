<?php
	$id = $_GET['id'];
	require_once 'form1.php';
	deleteForm1($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
