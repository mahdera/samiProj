<?php
    require_once 'district.php';
    $districtName = $_POST['zoneName'];
    $description = $_POST['description'];

    saveDistrict($districtName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> District Created Successfully!</div>
