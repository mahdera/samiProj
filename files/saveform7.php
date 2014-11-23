<?php
    session_start();
    @$q7_1 = mysql_real_escape_string($_POST['q7_1']);   

    require_once 'form7.php';
    saveForm7($q7_1, $_SESSION['LOGGED_USER_ID']);
?>
