<?php
    session_start();
    require_once 'responsibility.php';

    $teamId = $_POST['teamId'];
    $role = mysql_real_escape_string($_POST['role']);
    $responsibility = mysql_real_escape_string($_POST['responsibility']);

    saveResponsibility($teamId, $role, $responsibility, $_SESSION['LOGGED_USER_ID']);
?>
