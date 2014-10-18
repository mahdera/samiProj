<?php
    session_start();
    $fnId = $_POST['fnId'];
    $textAreaValue = $_POST['textAreaValue'];
    
    require_once 'fnaction.php';
    saveFnAction($fnId, $textAreaValue, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn Action Saved Successfully!</div>
