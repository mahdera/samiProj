<?php
    session_start();
    require_once 'thaction.php';
    $updatedText = mysql_real_escape_string($_POST['updatedText']);
    $thActionId = $_POST['thActionId'];
    updateThAction($thActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Action Updated Successfully!</div>
