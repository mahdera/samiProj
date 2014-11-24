<?php
    session_start();
    require_once 'fn.php';
    @$fnName = mysql_real_escape_string($_POST['fnName']);
    saveFn($fnName, $_SESSION['LOGGED_USER_ID'],0);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn saved successfully!</div>
