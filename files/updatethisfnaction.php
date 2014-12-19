<?php
    session_start();
    require_once 'fnaction.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    $updatedText = addslashes($_POST['updatedText']);
    $fnActionId = $_POST['fnActionId'];

    if($userObj->user_level == '02'){
      updateFnAction($fnActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
    }else if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObject)){
        updateFnAction($fnActionId, $updatedText, $userObject->id);
      }
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Updated Successfully</div>
