<?php
    session_start();
    require_once 'district.php';
    $zoneName = addslashes($_POST['zoneName']);
    $description = addslashes($_POST['description']);
    $zoneId = $_POST['zoneId'];

    updateDistrict($zoneId, $zoneName,$zoneName, $description, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> District Updated Successfully!</div>
