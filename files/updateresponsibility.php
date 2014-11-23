<?php
    session_start();
    require_once 'responsibility.php';
    //get the sent items here...
    $id = $_POST['id'];
    $teamId = $_POST['teamId'];
    $role = mysql_real_escape_string($_POST['role']);
    $responsibility = mysql_real_escape_string($_POST['responsibility']);
    updateResponsibility($id, $teamId, $role, $responsibility, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Responsibility Updated Successfully!</div>
