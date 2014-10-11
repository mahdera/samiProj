<?php
    session_start();
    $q4_1 = $_POST['q4_1'];   
    
    require_once 'form4.php';
    saveForm4($q4_1, $_SESSION['LOGGED_USER_ID']);
?>
