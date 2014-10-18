<?php
    session_start();
    $thId = $_POST['thId'];
    $textAreaValue = $_POST['textAreaValue'];
    
    require_once 'thaction.php';
    saveThAction($thId, $textAreaValue, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green">
	<span class="symbol icon-tick"></span>
	 	Th Action Saved Successfully!
</div>