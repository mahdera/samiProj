<?php
    require_once 'responsibility.php';
    //get the sent items here...
    $id = $_POST['id'];
    $teamId = $_POST['teamId'];
    $role = $_POST['role'];
    $responsibility = $_POST['responsibility'];
    updateResponsibility($id, $teamId, $role, $responsibility);
?>
<p style="background: lightgreen">
    Responsibility Updated Successfully!
</p>
