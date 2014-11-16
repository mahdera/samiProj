<?php
    session_start();
    $fnId = $_POST['fnId'];
    require_once 'goalsecondfn.php';
    $fnUsed = hasThisFnBeenUsedForGoalSecondByThisUser($fnId, $_SESSION['LOGGED_USER_ID']);
    if($fnUsed){
      ?>
          <div class="notify notify-red"><span class="symbol icon-error"></span> This Fn has already been used before. Please try selecting another Fn value from the select box!</div>
      <?php
    }
?>
