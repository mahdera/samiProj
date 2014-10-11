<?php
    session_start();
    $updatedText = $_POST['updatedText'];
    $thActionId = $_POST['thActionId'];
    require_once 'thaction.php';
    updateThAction($thActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">Th Action Updated Successfully!</p>

