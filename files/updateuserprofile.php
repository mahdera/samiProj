<?php
    session_start();
    require_once 'user.php';
    require_once 'userzone.php';
    require_once 'userbranch.php';

    $adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $memberType = $_POST['memberType'];
    $userStatus = $_POST['userStatus'];
    $userLevel = $_POST['userLevel'];
    $eitherZoneIdOrBranchId = $_POST['eitherZoneIdOrBranchId'];
    //now I can save this info to the database...
    if($userLevel == 'Branch Level'){
      
    }else if($userLevel == 'Zone Level'){

    }
    updateUser($id, $firstName, $lastName, $email,$phoneNumber, $memberType, $userStatus, $adminUser->id);
    require_once 'showusermanagementlist.php';
?>
