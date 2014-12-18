<?php
    session_start();
    require_once 'thaction.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    $updatedText = addslashes($_POST['updatedText']);
    $thActionId = $_POST['thActionId'];

    if($userObj->user_level == '02'){
      updateThAction($thActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObj)){
        updateThAction($thActionId, $updatedText, $userObj->id);
      }
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Updated Successfully</div>
