<?php
    session_start();
    require_once 'team.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $name = addslashes($_POST['name']);
    $title = addslashes($_POST['title']);
    $organization = addslashes($_POST['organization']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $interest = addslashes($_POST['interest']);

    if($_SESSION['USER_ROLE_CODE'] === '01A'){
      //now get any user who is in this sub district and currently active status
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObject)){
        saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $userObject->id);
      }
    }else{
      saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $_SESSION['LOGGED_USER_ID']);
    }
?>
