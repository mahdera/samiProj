<?php
    session_start();
    require_once 'user.php';
    //$adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $memberType = $_POST['memberType'];
    $userStatus = $_POST['userStatus'];
    //now I can save this info to the database...
    saveUser($firstName, $lastName, $email, $userId, $password, $phoneNumber, 
            $memberType, $userStatus, 0);
    echo 'User Account Successfully Created!';
?>
