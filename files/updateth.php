<?php
    session_start();
    $id = $_POST['id'];
    $thName = addslashes($_POST['thName']);
    require_once 'th.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    if($userObj->user_level == '02'){
      updateTh($id, $thName, $_SESSION['LOGGED_USER_ID']);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObj)){
        updateTh($id, $thName, $userObj->id);
      }
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Updated Successfully!</div>
