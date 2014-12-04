<?php
    session_start();
    $id = $_POST['id'];
    $thId = $_POST['thId'];
    $mg = addslashes($_POST['mg']);
    $dr = addslashes($_POST['dr']);
    $pr = addslashes($_POST['pr']);
    $wa = addslashes($_POST['wa']);
    $rs = addslashes($_POST['rs']);

    require_once 'risk.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    if($userObj->user_level == '02'){
      updateRisk($id, $thId, $mg, $dr, $pr, $wa, $rs, $_SESSION['LOGGED_USER_ID']);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(isset($userObj)){
        updateRisk($id, $thId, $mg, $dr, $pr, $wa, $rs, $userObj->id);
      }
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Risk Updated Successfully!</div>
