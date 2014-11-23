<?php
    require_once 'district.php';
    $zoneName = mysql_real_escape_string($_POST['zoneName']);
    $description = mysql_real_escape_string($_POST['description']);
    $zoneId = $_POST['zoneId'];

    updateDistrict($zoneId, $zoneName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> District Updated Successfully!</div>
