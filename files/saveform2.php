<?php
    session_start();
    @$q2_1 = mysql_real_escape_string($_POST['q2_1']);
    @$q2_2 = mysql_real_escape_string($_POST['q2_2']);
    @$q2_3 = mysql_real_escape_string($_POST['q2_3']);
    @$q2_4 = mysql_real_escape_string($_POST['q2_4']);

    require_once 'form2.php';
    saveForm2($q2_1, $q2_2, $q2_3, $q2_4, $_SESSION['LOGGED_USER_ID']);
?>
