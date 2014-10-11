<?php
    session_start();
    $updatedText = $_POST['updatedText'];
    $fnActionId = $_POST['fnActionId'];
    require_once 'fnaction.php';
    updateFnAction($fnActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">Fn Action Updated Successfully!</p>

