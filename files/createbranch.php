<?php
    require_once 'subdistrict.php';
    $zoneId = $_POST['zoneId'];
    $branchName = $_POST['branchName'];
    $description  = $_POST['description'];

    saveSubDistrict($zoneId, $branchName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Sub District Created Successfully!</div>
