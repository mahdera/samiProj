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
<div class="notify notify-green"><span class="symbol icon-tick"></span> Risk Updated Successfully!</div>