<?php
    require_once 'responsibility.php';
    
    $teamId = $_POST['teamId'];
    $role = $_POST['role'];
    $responsibility = $_POST['responsibility'];
    
    saveResponsibility($teamId, $role, $responsibility);
?>
