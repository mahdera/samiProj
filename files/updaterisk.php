<?php
    $id = $_POST['id'];
    $thId = $_POST['thId'];
    $mg = $_POST['mg'];
    $dr = $_POST['dr'];
    $pr = $_POST['pr'];
    $wa = $_POST['wa'];
    $rs = $_POST['rs'];
    
    require_once 'risk.php';
    updateRisk($id, $thId, $mg, $dr, $pr, $wa, $rs);
?>
<p style="background: lightgreen">Risk Updated Successfully!</p>