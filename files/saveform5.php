<?php
    session_start();
    $q5_1 = $_POST['q5_1'];   
    
    require_once 'form5.php';
    saveForm5($q5_1, $_SESSION['LOGGED_USER_ID']);
?>
