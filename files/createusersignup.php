<?php
    session_start();
    require_once 'user.php';
    require_once 'utility.php';
    //$adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $memberType = $_POST['memberType'];
    $userStatus = $_POST['userStatus'];//is in a pending status...so email the activation link

    //now I can save this info to the database...
    saveUser($firstName, $lastName, $email, $userId, $password, $phoneNumber, 
            $memberType, $userStatus, 0);
    //now send an activation email for this particular user via email.
    $activationLink = "http://www.domain.com/project_name/activateuserviaemail.php?email=".$email;
    $subject = "Your Account Activation";
    $message = "Welcome $firstName $lastName.<br/><br/>Please click or copy-paste to your browser URL bar the link below to activate your account." . 
    "<a href='$activationLink'>$activationLink</a>";
    sendEmail($email, $subject, $message, $from, $ccTo = null, $bcc = null);
?>
