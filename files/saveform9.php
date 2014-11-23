<?php
    session_start();
    $q9_1 = mysql_real_escape_string($_POST['q9_1']);   

    require_once 'form9.php';
    saveForm9($q9_1, $_SESSION['LOGGED_USER_ID']);
?>
