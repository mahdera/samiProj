<?php
    session_start();
    @$q4_1 = mysql_real_escape_string($_POST['q4_1']);

    require_once 'form4.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm4($q4_1, $userObj->id);
    }else if($userObj->user_level == '02'){
      saveForm4($q4_1, $_SESSION['LOGGED_USER_ID']);
    }
    //saveForm4($q4_1, $_SESSION['LOGGED_USER_ID']);
?>
