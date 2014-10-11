<?php
    session_start();
    $id = $_POST['id'];
    $thName = $_POST['thName'];
    require_once 'th.php';
    updateTh($id, $thName, $_SESSION['LOGGED_USER_ID']);
?>
<p style="background: lightgreen">Th Updated Successfully!</p>