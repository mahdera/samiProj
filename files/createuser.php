<?php
    session_start();
    require_once 'user.php';
    require_once 'userbranch.php';
    require_once 'userzone.php';

    $adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $memberType = $_POST['memberType'];
    $userStatus = $_POST['userStatus'];
    $userLevel = $_POST['userLevel'];
    $eitherZoneIdOrBranchId = $_POST['eitherZoneIdOrBranchId'];
    //$branchId = $_POST['branchId'];
    //now I can save this info to the database...
    saveUser($firstName, $lastName, $email, $userId, $password, $phoneNumber,
            $memberType, $userStatus, $userLevel, $adminUser->id);
    //fetch user by $userId and email address
    $fetchedUser = fetchUserByUserIdAndEmail($userId, $email);
    //now associate the newly crated user here
    if($userLevel == 'Branch Level'){
        saveUserBranch($branchId, $fetchedUser->id);
    }else if($userLevel == 'Zone Level'){
        saveUserZone($zoneId, $fetchedUser->id);
    }
    require_once 'showusermanagementlist.php';
?>
