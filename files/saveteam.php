<?php
    $name = $_POST['name'];
    $title = $_POST['title'];
    $organization = $_POST['organization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $interest = $_POST['interest'];
    
    require_once 'team.php';
    
    saveTeam($name, $title, $organization, $email, $phone, $interest);    
?>


