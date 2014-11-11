<?php
    require_once 'zone.php';
    $zoneName = $_POST['zoneName'];
    $description = $_POST['description'];

    saveZone($zoneName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Zone Created Successfully!</div>
