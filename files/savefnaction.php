<?php
    session_start();
    $fnId = $_POST['fnId'];
    $textAreaValue = $_POST['textAreaValue'];
    
    require_once 'fnaction.php';
    saveFnAction($fnId, $textAreaValue, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">
    Fn Action Saved Successfully!
</p>
