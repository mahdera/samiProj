<?php
    session_start();
    $q9_1 = addslashes($_POST['q9_1']);

    require_once 'form9.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObject)){
        saveForm9($q9_1, $userObject->id);
      }
    }else if($userObj->user_level == '02'){
      saveForm9($q9_1, $_SESSION['LOGGED_USER_ID']);
    }
?>
