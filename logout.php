<?php
    session_start();
    $_SESSION['USER_ID'] = null;
    $_SESSION['SELECTED_THS'] = null;
    //session_unset();
    //session_destroy();
    header("Location: login.php");
?>
