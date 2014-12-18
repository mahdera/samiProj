<?php
    session_start();
    require_once 'risk.php';
    require_once 'user.php';

    $thId = $_POST['thId'];
    $mg = addslashes($_POST['mg']);
    $dr = addslashes($_POST['dr']);
    $pr = addslashes($_POST['pr']);
    $wa = addslashes($_POST['wa']);
    $rs = addslashes($_POST['rs']);

    if($_SESSION['USER_ROLE_CODE'] === '01A'){
      //now get any user who is in this sub district and currently active status
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObject)){
        saveRisk($thId, $mg, $dr, $pr, $wa, $rs, $userObject->id);
      }
    }else{
      saveRisk($thId, $mg, $dr, $pr, $wa, $rs, $_SESSION['LOGGED_USER_ID']);
    }
?>
