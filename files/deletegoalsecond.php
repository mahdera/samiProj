<?php  
  require_once 'goalsecondfn.php';
  require_once 'fnaction.php';
  $fnId = $_POST['fnId'];
  $goalSecondFnObj = getGoalSecondFnForThisFn($fnId);
  if(!empty($goalSecondFnObj)){
    deleteFnActionForFn($fnId);
    deleteGoalSecondFn($goalSecondFnObj->id);
  }else{
    deleteGoalSecondFn($goalSecondFnObj->id);
  }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Goal Second Deleted Successfully!</div>
