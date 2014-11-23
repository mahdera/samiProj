<?php
    session_start();
    @$q8_1 = mysql_real_escape_string($_POST['q8_1']);   

    require_once 'form8.php';
    saveForm8($q8_1, $_SESSION['LOGGED_USER_ID']);
?>
