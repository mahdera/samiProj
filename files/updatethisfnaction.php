<?php
    session_start();
    require_once 'fnaction.php';
    @$updatedText = mysql_real_escape_string($_POST['updatedText']);
    $fnActionId = $_POST['fnActionId'];
    updateFnAction($fnActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn Action Updated Successfully!</div>
