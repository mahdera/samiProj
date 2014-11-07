<?php
  $goalFirstThId = $_POST['goalFirstThId'];
  require_once 'goalfirstth.php';
  deleteGoalFirstTh($goalFirstThId);
  ?>
  <div class="notify notify-green"><span class="symbol icon-tick"></span> Goal First Deleted Successfully!</div>
  <?php
  require_once 'showlistofgoalfirstsmodified.php';
?>
