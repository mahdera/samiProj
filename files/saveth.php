<?php
    session_start();
    require_once 'th.php';
    $thName = mysql_real_escape_string($_POST['thName']);

    saveTh($thName, $_SESSION['LOGGED_USER_ID']);
?>
