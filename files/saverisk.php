<?php
    session_start();
    require_once 'risk.php';
    require_once 'user.php';

    $thId = $_POST['thId'];
    @$mg = mysql_real_escape_string($_POST['mg']);
    @$dr = mysql_real_escape_string($_POST['dr']);
    @$pr = mysql_real_escape_string($_POST['pr']);
    @$wa = mysql_real_escape_string($_POST['wa']);
    @$rs = mysql_real_escape_string($_POST['rs']);

    if($_SESSION['USER_ROLE_CODE'] === '01A'){
      //now get any user who is in this sub district and currently active status
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveRisk($thId, $mg, $dr, $pr, $wa, $rs, $userObject->id);
    }else{
      saveRisk($thId, $mg, $dr, $pr, $wa, $rs, $_SESSION['LOGGED_USER_ID']);
    }
?>
