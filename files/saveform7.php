<?php
    session_start();
    $q7_1 = addslashes($_POST['q7_1']);

    require_once 'form7.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm7($q7_1, $userObject->id);
    }else if($userObj->user_level == '02'){
      saveForm7($q7_1, $_SESSION['LOGGED_USER_ID']);
    }
?>
