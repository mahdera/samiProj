<?php
    session_start();
    $q10_1 = $_POST['q10_1'];   
    
    require_once 'form10.php';
    saveForm10($q10_1, $_SESSION['LOGGED_USER_ID']);
?>
