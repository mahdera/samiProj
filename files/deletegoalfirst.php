<?php
  //$goalFirstThId = $_POST['goalFirstThId'];
  $thId = $_POST['thId'];
  require_once 'goalfirstth.php';
  require_once 'thaction.php';
  //$goalFirstThObj = getGoalFirstTh($goalFirstThId);
  $goalFirstThObj = getGoalFirstThForTh($thId);  
  //delete th action table also...
  if(!empty($goalFirstThObj)){
    deleteThActionForTh($thId);
    deleteGoalFirstTh($goalFirstThObj->id);
  }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Deleted Successfully</div>
