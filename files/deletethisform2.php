<?php
	$id = $_GET['id'];
	require_once 'form2.php';
	deleteForm2($id);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Record Deleted Successfully</div>
