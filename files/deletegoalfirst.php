<?php
  $goalFirstThId = $_POST['goalFirstThId'];
  require_once 'goalfirstth.php';
  require_once 'thaction.php';
  $goalFirstThObj = getGoalFirstTh($goalFirstThId);
  //delete th action table also...
  if(!empty($goalFirstThObj)){
    deleteThActionForTh($goalFirstThObj->th_id);
    deleteGoalFirstTh($goalFirstThId);
  }
?>
    <div class="notify notify-green"><span class="symbol icon-tick"></span> Deleted Successfully</div>
  <?php
  require_once 'showlistofgoalfirstsmodified.php';
?>
