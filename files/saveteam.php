<?php
    session_start();
    require_once 'team.php';
    $name = $_POST['name'];
    $title = $_POST['title'];
    $organization = $_POST['organization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $interest = $_POST['interest'];

    saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $_SESSION['LOGGED_USER_ID']);
?>
