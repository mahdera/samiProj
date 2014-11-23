<?php
    session_start();
    $q6_1 = mysql_real_escape_string($_POST['q6_1']);   

    require_once 'form6.php';
    saveForm6($q6_1, $_SESSION['LOGGED_USER_ID']);
?>
