<?php
    session_start();
    require_once 'th.php';
    $thName = $_POST['thName'];
    
    saveTh($thName, $_SESSION['LOGGED_USER_ID']);
?>
