<?php
  $goalSecondFnId = $_POST['goalSecondFnId'];
  require_once 'goalsecondfn.php';
  require_once 'fnaction.php';
  @$goalSecondFnObj = getGoalSecondFn($goalSecondFnId);
  if(!empty($goalSecondFnObj)){
    deleteFnActionForFn($goalSecondFnObj->fn_id);
    deleteGoalSecondFn($goalSecondFnId);
  }else{
    deleteGoalSecondFn($goalSecondFnId);
  }
?>
  <div class="notify notify-green"><span class="symbol icon-tick"></span> Goal Second Deleted Successfully!</div>
  <?php
  require_once 'showlistofgoalsecondsmodified.php';
?>
