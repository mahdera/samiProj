<?php
    session_start();
    require_once 'responsibility.php';

    $teamId = $_POST['teamId'];
    $role = addslashes($_POST['role']);
    $responsibility = addslashes($_POST['responsibility']);

    saveResponsibility($teamId, $role, $responsibility, $_SESSION['LOGGED_USER_ID']);
?>
