<?php
    session_start();
    $q3_1 = $_POST['q3_1'];   
    
    require_once 'form3.php';
    saveForm3($q3_1, $_SESSION['LOGGED_USER_ID']);
?>
