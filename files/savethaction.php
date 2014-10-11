<?php
    session_start();
    $thId = $_POST['thId'];
    $textAreaValue = $_POST['textAreaValue'];
    
    require_once 'thaction.php';
    saveThAction($thId, $textAreaValue, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">
    Th Action Saved Successfully!
</p>
