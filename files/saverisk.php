<?php
    session_start();
    require_once 'risk.php';
    
    $thId = $_POST['thId'];
    $mg = $_POST['mg'];
    $dr = $_POST['dr'];
    $pr = $_POST['pr'];
    $wa = $_POST['wa'];
    $rs = $_POST['rs'];
    
    saveRisk($thId, $mg, $dr, $pr, $wa, $rs, $_SESSION['LOGGED_USER_ID']);
?>
