<?php
    session_start();
    $thId = $_POST['thId'];
    require_once 'goalfirstth.php';
    $thUsed = hasThisThBeenUsedForGoalFirstByThisUser($thId, $_SESSION['LOGGED_USER_ID']);
    if($thUsed){
      ?>
          <div class="notify notify-red"><span class="symbol icon-error"></span> This Th has already been used before. Please try selecting another Th value from the select box!</div>
      <?php
    }else{

    }
?>
