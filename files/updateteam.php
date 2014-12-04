<?php
    session_start();
    $id = $_POST['id'];
    $name = addslashes($_POST['name']);
    $title = addslashes($_POST['title']);
    $organization = addslashes($_POST['organization']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $interest = addslashes($_POST['interest']);

    require_once 'team.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    if($userObj->user_level == '02'){
        updateTeam($id, $name, $title, $organization, $email, $phone, $interest, $_SESSION['LOGGED_USER_ID']);
    }else if($userObj->user_level == '01'){
        $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        if(isset($userObj)){
          updateTeam($id, $name, $title, $organization, $email, $phone, $interest, $userObj->id);
        }
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Team Updated Successfully!</div>
