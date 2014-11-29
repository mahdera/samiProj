<?php
    session_start();
    $id = $_POST['id'];
    @$name = mysql_real_escape_string($_POST['name']);
    @$title = mysql_real_escape_string($_POST['title']);
    @$organization = mysql_real_escape_string($_POST['organization']);
    @$email = mysql_real_escape_string($_POST['email']);
    @$phone = mysql_real_escape_string($_POST['phone']);
    @$interest = mysql_real_escape_string($_POST['interest']);

    require_once 'team.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    if($userObj->user_level == '02'){
        updateTeam($id, $name, $title, $organization, $email, $phone, $interest, $_SESSION['LOGGED_USER_ID']);
    }else if($userObj->user_level == '01'){
        $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        updateTeam($id, $name, $title, $organization, $email, $phone, $interest, $userObj->id);
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Team Updated Successfully!</div>
