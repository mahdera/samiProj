<?php
    session_start();
    require_once 'fn.php';
    $fnName = $_POST['fnName'];
    saveFn($fnName, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn saved successfully!</div>
