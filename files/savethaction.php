<?php
    session_start();
    @$thId = mysql_real_escape_string($_POST['thId']);
    @$textAreaValue = mysql_real_escape_string($_POST['textAreaValue']);

    require_once 'thaction.php';
    require_once 'user.php';

    if($_SESSION['USER_ROLE_CODE'] === '01A'){
        //now get any user who is in this sub district and currently active status
        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        //saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $userObject->id);
        saveThAction($thId, $textAreaValue, $userObject->id);
    }else{
        saveThAction($thId, $textAreaValue, $_SESSION['LOGGED_USER_ID']);
    }
?>
<div class="notify notify-green">
	<span class="symbol icon-tick"></span>
	 	Th Action Saved Successfully!
</div>
