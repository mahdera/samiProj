<?php
    session_start();
    require_once 'fnaction.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    @$updatedText = mysql_real_escape_string($_POST['updatedText']);
    $fnActionId = $_POST['fnActionId'];

    if($userObj->user_level == '02'){
      updateFnAction($fnActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      updateFnAction($fnActionId, $updatedText, $userObj->id);
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn Action Updated Successfully!</div>
