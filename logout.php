<?php
    session_start();
    $_SESSION['USER_ID'] = null;
    //session_unset();
    //session_destroy();
    header("Location: login.php");
?>
