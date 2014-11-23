<?php
    session_start();
    require_once 'risk.php';

    $thId = $_POST['thId'];
    $mg = mysql_real_escape_string($_POST['mg']);
    $dr = mysql_real_escape_string($_POST['dr']);
    $pr = mysql_real_escape_string($_POST['pr']);
    $wa = mysql_real_escape_string($_POST['wa']);
    $rs = mysql_real_escape_string($_POST['rs']);

    saveRisk($thId, $mg, $dr, $pr, $wa, $rs, $_SESSION['LOGGED_USER_ID']);
?>
