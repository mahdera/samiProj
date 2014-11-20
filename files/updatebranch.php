<?php
    require_once 'subdistrict.php';
    $zoneId = $_POST['zoneId'];
    $branchName = $_POST['branchName'];
    $description = $_POST['description'];
    $branchId = $_POST['branchId'];

    updateSubDistrict($branchId, $zoneId, $branchName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Sub District Updated Successfully!</div>
