<?php
    session_start();
    $id = $_POST['id'];
    $thId = $_POST['thId'];
    @$mg = mysql_real_escape_string($_POST['mg']);
    @$dr = mysql_real_escape_string($_POST['dr']);
    @$pr = mysql_real_escape_string($_POST['pr']);
    @$wa = mysql_real_escape_string($_POST['wa']);
    @$rs = mysql_real_escape_string($_POST['rs']);

    require_once 'risk.php';
    updateRisk($id, $thId, $mg, $dr, $pr, $wa, $rs, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Risk Updated Successfully!</div>
