<?php
    session_start();
    $q6_1 = addslashes($_POST['q6_1']);

    require_once 'form6.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm6($q6_1, $userObj->id);
    }else if($userObj->user_level == '02'){
      saveForm6($q6_1, $_SESSION['LOGGED_USER_ID']);
    }
?>
