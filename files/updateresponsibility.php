<?php
    session_start();
    require_once 'responsibility.php';
    //get the sent items here...
    $id = $_POST['id'];
    $teamId = $_POST['teamId'];
    $role = $_POST['role'];
    $responsibility = $_POST['responsibility'];
    updateResponsibility($id, $teamId, $role, $responsibility, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">
    Responsibility Updated Successfully!
</p>
