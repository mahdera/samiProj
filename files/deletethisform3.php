<?php
	$id = $_GET['id'];
	require_once 'form3.php';
	deleteForm3($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
