<?php
    session_start();
    $q2_1 = $_POST['q2_1'];
    $q2_2 = $_POST['q2_2'];
    $q2_3 = $_POST['q2_3'];
    $q2_4 = $_POST['q2_4'];
    
    require_once 'form2.php';
    saveForm2($q2_1, $q2_2, $q2_3, $q2_4, $_SESSION['LOGGED_USER_ID']);
?>
