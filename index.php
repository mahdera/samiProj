<?php
    session_start();
    //var_dump($_SESSION['USER_ID']);
    //if(!is_set($_SESSION['USER_ID'])){
        //kick the user out and force the user to login again
        //header("Location: login.php");
    //}else{
        header("Location: intro1.php");
    //}
?>