<?php
  $goalFirstId = $_POST['goalFirstId'];
  require_once 'goalfirst.php';
  deleteGoalFirst($goalFirstId);
  ?>
  <div class="notify notify-green"><span class="symbol icon-tick"></span> Goal First Deleted Successfully!</div>
  <?php
  require_once 'showlistofgoalfirstsmodified.php';
?>
