<?php
    session_start();
    require_once 'subdistrict.php';
    $zoneId = $_POST['zoneId'];
    @$branchName = mysql_real_escape_string($_POST['branchName']);
    @$description = mysql_real_escape_string($_POST['description']);
    $branchId = $_POST['branchId'];

    updateSubDistrict($branchId, $zoneId, $branchName,$branchName, $description, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Sub District Updated Successfully!</div>
