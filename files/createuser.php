<?php
    session_start();
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    require_once 'userdistrict.php';

    $adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $firstName = mysql_real_escape_string($_POST['firstName']);
    $lastName = mysql_real_escape_string($_POST['lastName']);
    $email = mysql_real_escape_string($_POST['email']);
    $userId = mysql_real_escape_string($_POST['userId']);
    $password = mysql_real_escape_string($_POST['password']);
    $phoneNumber = mysql_real_escape_string($_POST['phoneNumber']);
    $memberType = mysql_real_escape_string($_POST['memberType']);
    $userStatus = mysql_real_escape_string($_POST['userStatus']);
    $userLevel = mysql_real_escape_string($_POST['userLevel']);
    $eitherZoneIdOrBranchId = $_POST['eitherZoneIdOrBranchId'];
    $userRole = mysql_real_escape_string($_POST['userRole']);
    //$branchId = $_POST['branchId'];
    //now I can save this info to the database...
    saveUser($firstName, $lastName, $email, $userId, $password, $phoneNumber,
            $memberType, $userStatus, $userLevel,$userRole, $adminUser->id);
    //fetch user by $userId and email address
    $fetchedUser = fetchUserByUserIdAndEmail($userId, $email);
    //now associate the newly crated user here
    if($userLevel == '02'){
        saveUserSubDistrict($eitherZoneIdOrBranchId, $fetchedUser->id);
    }else if($userLevel == '01'){
        //According to the email recieved from here dated Dec 02, there is no
        //need to create a District level user...
        saveUserDistrict($eitherZoneIdOrBranchId, $fetchedUser->id);
    }
    require_once 'showusermanagementlist.php';
?>
