<?php
    require_once 'district.php';
    $zoneName = $_POST['zoneName'];
    $description = $_POST['description'];
    $zoneId = $_POST['zoneId'];

    updateDistrict($zoneId, $zoneName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> District Updated Successfully!</div>
