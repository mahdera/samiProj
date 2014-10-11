<?php
    session_start();
    require_once 'user.php';
    $adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];    
    $phoneNumber = $_POST['phoneNumber'];
    $memberType = $_POST['memberType'];
    $userStatus = $_POST['userStatus'];
    //now I can save this info to the database...
    updateUser($id, $firstName, $lastName, $email,$phoneNumber, $memberType, $userStatus, $adminUser);
    require_once 'showusermanagementlist.php';
?>
