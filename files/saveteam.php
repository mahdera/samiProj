<?php
    $name = $_GET['name'];
    $title = $_GET['title'];
    $organization = $_GET['organization'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $interest = $_GET['interest'];
    
    require_once 'team.php';
    
    saveTeam($name, $title, $organization, $email, $phone, $interest);    
?>


