<?php
    require_once 'zone.php';
    $zoneName = $_POST['zoneName'];
    $description = $_POST['description'];
    $zoneId = $_POST['zoneId'];

    updateZone($zoneId, $zoneName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Zone Updated Successfully!</div>
