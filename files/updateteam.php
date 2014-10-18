<?php
    session_start();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $organization = $_POST['organization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $interest = $_POST['interest'];
    
    require_once 'team.php';    
    updateTeam($id, $name, $title, $organization, $email, $phone, $interest, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Team Updated Successfully!</div>

