<?php
    session_start();
    $id = $_POST['id'];
    $thName = $_POST['thName'];
    require_once 'th.php';
    updateTh($id, $thName, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Updated Successfully!</div>