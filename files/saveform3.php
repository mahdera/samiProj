<?php
    session_start();
    @$q3_1 = mysql_real_escape_string($_POST['q3_1']);   

    require_once 'form3.php';
    saveForm3($q3_1, $_SESSION['LOGGED_USER_ID']);
?>
