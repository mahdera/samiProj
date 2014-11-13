<?php
    session_start();
    require_once 'user.php';
    require_once 'userbranch.php';
    require_once 'userzone.php';
    require_once 'utility.php';
    //get the values...
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $memberType = $_POST['memberType'];
    $userStatus = $_POST['userStatus'];//is in a pending status...so email the activation link
    $userLevel = $_POST['userLevel'];
    $eitherZoneIdOrBranchId = $_POST['eitherZoneIdOrBranchId'];
    //now I can save this info to the database...
    saveUser($firstName, $lastName, $email, $userId, $password, $phoneNumber,
                    $memberType, $userStatus, $userLevel, 0);
    //fetch user by $userId and email address
    $fetchedUser = fetchUserByUserIdAndEmail($userId, $email);
    //now associate the newly crated user here
    if($userLevel == 'Branch Level'){
        saveUserBranch($eitherZoneIdOrBranchId, $fetchedUser->id);
    }else if($userLevel == 'Zone Level'){
        saveUserZone($eitherZoneIdOrBranchId, $fetchedUser->id);
    }
    //now send an activation email for this particular user via email.
    $activationLink = "http://www.domain.com/project_name/activateuserviaemail.php?email=".$email;
    $subject = "Your Account Activation";
    $from = "mahderalem@gmail.com";
    $message = "Welcome $firstName $lastName.<br/><br/>Please click or copy-paste to your browser URL bar the link below to activate your account." .
    "<a href='$activationLink'>$activationLink</a>";
    sendEmail($email, $subject, $message, $from, $ccTo = null, $bcc = null);
?>
