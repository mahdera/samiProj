<?php
    session_start();
    @$q9_1 = mysql_real_escape_string($_POST['q9_1']);

    require_once 'form9.php';
    require_once 'user.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveForm9($q9_1, $userObj->id);
    }else if($userObj->user_level == '02'){
      saveForm9($q9_1, $_SESSION['LOGGED_USER_ID']);
    }    
?>
