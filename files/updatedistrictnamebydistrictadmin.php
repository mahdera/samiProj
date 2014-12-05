<?php
    session_start();
    require_once 'district.php';

    $districtId = $_POST['districtId'];
    $districtName = $_POST['districtName'];

    updateDistrict($districtId, $districtName, $districtName, "---", $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> District Updated Successfully!</div>
