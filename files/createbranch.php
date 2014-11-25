<?php
    require_once 'subdistrict.php';
    $zoneId = $_POST['zoneId'];
    @$branchName = mysql_real_escape_string($_POST['branchName']);
    @$description  = mysql_real_escape_string($_POST['description']);

    saveSubDistrict($zoneId, $branchName,$branchName, $description);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Sub District Created Successfully!</div>
