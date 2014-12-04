<?php
    session_start();
    $q8_1 = addslashes($_POST['q8_1']);

    require_once 'form8.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm8($q8_1, $userObject->id);
    }else if($userObj->user_level == '02'){
      saveForm8($q8_1, $_SESSION['LOGGED_USER_ID']);
    }
?>
