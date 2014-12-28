<?php
    session_start();
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg3obj.php';
    require_once 'goalsecondfn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    require_once 'fnaction.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    $fnId = $_POST['fnId'];
    $txtG1Val = addslashes($_POST['txtG1Val']);
    $txtG2Val = addslashes($_POST['txtG2Val']);
    $txtG3Val = addslashes($_POST['txtG3Val']);
    $goalSecondG1Id = $_POST['goalSecondG1Id'];
    //$goalSecondG1ObjId = $_POST['goalSecondG1ObjId'];
    $goalSecondG2Id = $_POST['goalSecondG2Id'];
    //$goalSecondG2ObjId = $_POST['goalSecondG2ObjId'];
    $goalSecondG3Id = $_POST['goalSecondG3Id'];
    //$goalSecondG3ObjId = $_POST['goalSecondG3ObjId'];
    $goalSecondFnId = $_POST['goalSecondFnId'];
    $goalSecondG1Ctr = $_POST['goalSecondG1Ctr'];
    $goalSecondG2Ctr = $_POST['goalSecondG2Ctr'];
    $goalSecondG3Ctr = $_POST['goalSecondG3Ctr'];
    $fnActionControlName = "textareafnaction" . $fnId;
    if( isset($_POST[$fnActionControlName]) ){
        $fnActionVal = $_POST[$fnActionControlName];
    }

    for($i=1; $i<=$goalSecondG1Ctr; $i++){
        $goalSecondG1ObjControlName = "edittxtgoalsecondg1obj" . $fnId . $i;
        $goalSecondG1ObjHiddenIdControlName = "hiddengoalsecondg1objid" . $fnId . $i;
        $goalSecondG1ObjVal = addslashes($_POST["$goalSecondG1ObjControlName"]);
        $goalSecondG1ObjHiddenIdVal = $_POST["$goalSecondG1ObjHiddenIdControlName"];
        //now update the data value...
        if($userObj->user_level == '02'){
          updateGoalSecondG1($goalSecondG1Id, $goalSecondFnId, $txtG1Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalSecondG1Obj($goalSecondG1ObjHiddenIdVal, $goalSecondG1Id, $goalSecondG1ObjVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObj)){
            updateGoalSecondG1($goalSecondG1Id, $goalSecondFnId, $txtG1Val, $userObj->id);
            updateGoalSecondG1Obj($goalSecondG1ObjHiddenIdVal, $goalSecondG1Id, $goalSecondG1ObjVal, $userObj->id);
          }
        }
    }

    for($j=1; $j<=$goalSecondG2Ctr; $j++){
        $goalSecondG2ObjControlName = "edittxtgoalsecondg2obj" . $fnId . $j;
        $goalSecondG2ObjHiddenIdControlName = "hiddengoalsecondg2objid" . $fnId . $j;
        $goalSecondG2ObjVal = addslashes($_POST["$goalSecondG2ObjControlName"]);
        $goalSecondG2ObjHiddenIdVal = $_POST["$goalSecondG2ObjHiddenIdControlName"];
        //now update the data value...
        if($userObj->user_level == '02'){
          updateGoalSecondG2($goalSecondG2Id, $goalSecondFnId, $txtG2Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalSecondG2Obj($goalSecondG2ObjHiddenIdVal, $goalSecondG2Id, $goalSecondG2ObjVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObj)){
            updateGoalSecondG2($goalSecondG2Id, $goalSecondFnId, $txtG2Val, $userObj->id);
            updateGoalSecondG2Obj($goalSecondG2ObjHiddenIdVal, $goalSecondG2Id, $goalSecondG2ObjVal, $userObj->id);
          }
        }
    }

    for($k=1; $k<=$goalSecondG3Ctr; $k++){
        $goalSecondG3ObjControlName = "edittxtgoalsecondg3obj" . $fnId . $k;
        $goalSecondG3ObjHiddenIdControlName = "hiddengoalsecondg3objid" . $fnId . $k;
        $goalSecondG3ObjVal = addslashes($_POST["$goalSecondG3ObjControlName"]);
        $goalSecondG3ObjHiddenIdVal = $_POST["$goalSecondG3ObjHiddenIdControlName"];
        //now update the data value...
        if($userObj->user_level == '02'){
          updateGoalSecondG3($goalSecondG3Id, $goalSecondFnId, $txtG3Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalSecondG3Obj($goalSecondG3ObjHiddenIdVal, $goalSecondG3Id, $goalSecondG3ObjVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObj)){
            updateGoalSecondG3($goalSecondG3Id, $goalSecondFnId, $txtG3Val, $userObj->id);
            updateGoalSecondG3Obj($goalSecondG3ObjHiddenIdVal, $goalSecondG3Id, $goalSecondG3ObjVal, $userObj->id);
          }
        }
    }

    //now update the th action in here...
    if( isset($_POST[$fnActionControlName]) ){
        updateFnActionForFn($fnId, $fnActionVal);
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Updated Successfully</div>
