<?php
    session_start();
    require_once 'team.php';
    @$name = mysql_real_escape_string($_POST['name']);
    @$title = mysql_real_escape_string($_POST['title']);
    @$organization = mysql_real_escape_string($_POST['organization']);
    @$email = mysql_real_escape_string($_POST['email']);
    @$phone = mysql_real_escape_string($_POST['phone']);
    @$interest = mysql_real_escape_string($_POST['interest']);

    saveTeam($name, $title, $organization, $email, $phone, rtrim($interest, ','), $_SESSION['LOGGED_USER_ID']);
?>
