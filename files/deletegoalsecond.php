<?php
  $goalSecondFnId = $_POST['goalSecondFnId'];
  require_once 'goalsecondfn.php';
  deleteGoalSecondFn($goalSecondFnId);
  ?>
  <div class="notify notify-green"><span class="symbol icon-tick"></span> Goal Second Deleted Successfully!</div>
  <?php
  require_once 'showlistofgoalsecondsmodified.php';
?>
