<?php
    session_start();
    $id = $_POST['id'];
    @$name = mysql_real_escape_string($_POST['name']);
    @$title = mysql_real_escape_string($_POST['title']);
    @$organization = mysql_real_escape_string($_POST['organization']);
    @$email = mysql_real_escape_string($_POST['email']);
    @$phone = mysql_real_escape_string($_POST['phone']);
    @$interest = mysql_real_escape_string($_POST['interest']);

    require_once 'team.php';
    updateTeam($id, $name, $title, $organization, $email, $phone, $interest, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Team Updated Successfully!</div>
