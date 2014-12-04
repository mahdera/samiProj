<?php
    session_start();
    $q10_1 = addslashes($_POST['q10_1']);

    require_once 'form10.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm10($q10_1, $userObject->id);
    }else if($userObj->user_level == '02'){
      saveForm10($q10_1, $_SESSION['LOGGED_USER_ID']);
    }
?>
