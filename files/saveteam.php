<?php
    session_start();
    require_once 'team.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    @$name = mysql_real_escape_string($_POST['name']);
    @$title = mysql_real_escape_string($_POST['title']);
    @$organization = mysql_real_escape_string($_POST['organization']);
    @$email = mysql_real_escape_string($_POST['email']);
    @$phone = mysql_real_escape_string($_POST['phone']);
    @$interest = mysql_real_escape_string($_POST['interest']);

    if($_SESSION['USER_ROLE_CODE'] === '01A'){
      //now get any user who is in this sub district and currently active status
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $userObject->id);
    }else{
      saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $_SESSION['LOGGED_USER_ID']);
    }
?>
