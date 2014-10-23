<?php
  $goalSecondId = $_POST['goalSecondId'];
  require_once 'goalsecond.php';
  deleteGoalSecond($goalSecondId);
  ?>
  <div class="notify notify-green"><span class="symbol icon-tick"></span> Goal Second Deleted Successfully!</div>
  <?php
  require_once 'showlistofgoalsecondsmodified.php';
?>
