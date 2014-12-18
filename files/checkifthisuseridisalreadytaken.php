<?php
    require_once 'user.php';
    $userId = $_POST['userId'];
    $isTaken = isThisUserAccountAlreadyTaken($userId);
    if($isTaken >= 1){
      //user id is taken
      echo 'Taken';
    }else{
      //user id is free
      echo 'Free';
    }
?>
