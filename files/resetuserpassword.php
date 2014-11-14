<?php
    $id = $_POST['id'];
    $resetPassword = $_POST['resetPassword'];
    require_once 'user.php';
    resetUserPassword($id, $resetPassword);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> User Password Reset Successfully!</div>
