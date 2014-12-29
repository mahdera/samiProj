<?php
    session_start();
    $fnId = addslashes($_POST['fnId']);
    $textAreaValue = addslashes($_POST['textAreaValue']);
    $goalSecondId = $_POST['goalSecondId'];

    require_once 'fnaction.php';
    require_once 'user.php';

    if($_SESSION['USER_ROLE_CODE'] === '01A'){
      //now get any user who is in this sub district and currently active status
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      //saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $userObject->id);
      if(!empty($userObject)){
        saveFnAction($fnId, $textAreaValue, $goalSecondId, $userObject->id);
      }
    }else{
      saveFnAction($fnId, $textAreaValue, $goalSecondId, $_SESSION['LOGGED_USER_ID']);
    }


?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Saved Successfully</div>
