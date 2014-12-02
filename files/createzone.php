<?php
    session_start();

    require_once 'district.php';
    @$districtName = mysql_real_escape_string($_POST['zoneName']);
    @$description = mysql_real_escape_string($_POST['description']);

    saveDistrict($districtName,$districtName, $description, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> District Created Successfully!</div>
