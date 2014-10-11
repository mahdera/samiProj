<?php
    session_start();
    $id = $_POST['id'];
    $thId = $_POST['thId'];
    $mg = $_POST['mg'];
    $dr = $_POST['dr'];
    $pr = $_POST['pr'];
    $wa = $_POST['wa'];
    $rs = $_POST['rs'];
    
    require_once 'risk.php';
    updateRisk($id, $thId, $mg, $dr, $pr, $wa, $rs, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">Risk Updated Successfully!</p>