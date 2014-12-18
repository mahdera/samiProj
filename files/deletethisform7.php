<?php
	$id = $_GET['id'];
	require_once 'form7.php';
	deleteForm7($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
