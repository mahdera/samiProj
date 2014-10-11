<?php
    $id = $_POST['id'];
    $resetPassword = $_POST['resetPassword'];
    require_once 'user.php';
    resetUserPassword($id, $resetPassword);
?>
<p style="background: lightgreen">User Password Reset Successfully!</p>
