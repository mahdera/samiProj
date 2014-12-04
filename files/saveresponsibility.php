<?php
    session_start();
    require_once 'responsibility.php';

    $teamId = $_POST['teamId'];
    $role = addslashes($_POST['role']);
    $responsibility = addslashes($_POST['responsibility']);

    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObject)){
        saveResponsibility($teamId, $role, $responsibility, $userObject->id);
      }
    }else if($userObj->user_level == '02'){
      saveResponsibility($teamId, $role, $responsibility, $_SESSION['LOGGED_USER_ID']);
    }
?>
