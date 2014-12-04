<?php
    session_start();
    $q3_1 = addslashes($_POST['q3_1']);

    require_once 'form3.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm3($q3_1, $userObject->id);
    }else if($userObj->user_level == '02'){
      saveForm3($q3_1, $_SESSION['LOGGED_USER_ID']);
    }
?>
