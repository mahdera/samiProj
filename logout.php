<?php
    session_start();
    $_SESSION['USER_ID'] = null;
    $_SESSION['SELECTED_THS'] = null;
    $_SESSION['SUB_DISTRICT_ID'] = null;
    $_SESSION['USER_ROLE_CODE'] = null;
    //session_unset();
    //session_destroy();
    header("Location: login.php");
?>
