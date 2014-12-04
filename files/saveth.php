<?php
    session_start();
    require_once 'th.php';
    require_once 'user.php';
    $thName = addslashes($_POST['thName']);

    if($_SESSION['USER_ROLE_CODE'] === '01A'){
      //now get any user who is in this sub district and currently active status
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObject)){
        saveTh($thName, $userObject->id);
      }
    }else{
      saveTh($thName, $_SESSION['LOGGED_USER_ID']);
    }
?>
