<?php
    session_start();
    $updatedText = $_POST['updatedText'];
    $thActionId = $_POST['thActionId'];
    require_once 'thaction.php';
    updateThAction($thActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Action Updated Successfully!</div>

