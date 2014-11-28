<?php
    session_start();
    @$q3_1 = mysql_real_escape_string($_POST['q3_1']);

    require_once 'form3.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm3($q3_1, $userObj->id);
    }else if($userObj->user_level == '02'){
      saveForm3($q3_1, $_SESSION['LOGGED_USER_ID']);
    }    
?>
