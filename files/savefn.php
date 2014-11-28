<?php
    session_start();
    require_once 'fn.php';
    require_once 'user.php';

    @$fnName = mysql_real_escape_string($_POST['fnName']);
    if($_SESSION['USER_ROLE_CODE'] === '01A'){
      //now get any user who is in this sub district and currently active status
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveFn($fnName, $userObject->id,0);
    }else{
      saveFn($fnName, $_SESSION['LOGGED_USER_ID'],0);
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Fn saved successfully!</div>
