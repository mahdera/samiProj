<?php
	$id = $_GET['id'];
	require_once 'form5.php';
	deleteForm5($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
