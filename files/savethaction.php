<?php
    session_start();
    @$thId = mysql_real_escape_string($_POST['thId']);
    @$textAreaValue = mysql_real_escape_string($_POST['textAreaValue']);

    require_once 'thaction.php';
    saveThAction($thId, $textAreaValue, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green">
	<span class="symbol icon-tick"></span>
	 	Th Action Saved Successfully!
</div>
