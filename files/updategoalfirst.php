<?php
    session_start();
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    $thId = $_POST['thId'];
    @$txtG1Val = mysql_real_escape_string($_POST['txtG1Val']);
    @$slctFn1Val = mysql_real_escape_string($_POST['slctFn1Val']);
    @$txtG2Val = mysql_real_escape_string($_POST['txtG2Val']);
    @$slctFn2Val = mysql_real_escape_string($_POST['slctFn2Val']);
    @$txtG3Val = mysql_real_escape_string($_POST['txtG3Val']);
    @$slctFn3Val = mysql_real_escape_string($_POST['slctFn3Val']);
    $goalFirstG1Id = $_POST['goalFirstG1Id'];
    $goalFirstG2Id = $_POST['goalFirstG2Id'];
    $goalFirstG3Id = $_POST['goalFirstG3Id'];
    $goalFirstG1Ctr = $_POST['goalFirstG1Ctr'];
    $goalFirstG2Ctr = $_POST['goalFirstG2Ctr'];
    $goalFirstG3Ctr = $_POST['goalFirstG3Ctr'];
    $goalFirstThId = $_POST['goalFirstThId'];

    for($i=1; $i<=$goalFirstG1Ctr; $i++){
        $goalFirstG1ObjControlName = "edittxtgoalfirstg1obj" . $thId . $i;
        $goalFirstG1FnControlName = "editslctgoalfirstg1fn" . $thId . $i;
        $goalFirstG1ObjHiddenIdControlName = "hiddengoalfirstg1objid" . $thId . $i;
        $goalFirstG1ObjVal = $_POST["$goalFirstG1ObjControlName"];
        $goalFirstG1FnVal = $_POST["$goalFirstG1FnControlName"];
        $goalFirstG1ObjHiddenIdVal = $_POST["$goalFirstG1ObjHiddenIdControlName"];
        //now update the data value...
        if($userObj->user_level == '02'){
          updateGoalFirstG1($goalFirstG1Id, $goalFirstThId, $txtG1Val, $slctFn1Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalFirstG1ObjFn($goalFirstG1ObjHiddenIdVal, $goalFirstG1Id, $goalFirstG1ObjVal, $goalFirstG1FnVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          updateGoalFirstG1($goalFirstG1Id, $goalFirstThId, $txtG1Val, $slctFn1Val, $userObj->id);
          updateGoalFirstG1ObjFn($goalFirstG1ObjHiddenIdVal, $goalFirstG1Id, $goalFirstG1ObjVal, $goalFirstG1FnVal, $userObj->id);
        }
    }

    for($j=1; $j<=$goalFirstG2Ctr; $j++){
        $goalFirstG2ObjControlName = "edittxtgoalfirstg2obj" . $thId . $j;
        $goalFirstG2FnControlName = "editslctgoalfirstg2fn" . $thId . $j;
        $goalFirstG2ObjHiddenIdControlName = "hiddengoalfirstg2objid" . $thId . $j;
        $goalFirstG2ObjVal = $_POST["$goalFirstG2ObjControlName"];
        $goalFirstG2FnVal = $_POST["$goalFirstG2FnControlName"];
        $goalFirstG2ObjHiddenIdVal = $_POST["$goalFirstG2ObjHiddenIdControlName"];
        //now update the data value...
        if($userObj->user_level == '02'){
          updateGoalFirstG2($goalFirstG2Id, $goalFirstThId, $txtG2Val, $slctFn2Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalFirstG2ObjFn($goalFirstG2ObjHiddenIdVal, $goalFirstG2Id, $goalFirstG2ObjVal, $goalFirstG2FnVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          updateGoalFirstG2($goalFirstG2Id, $goalFirstThId, $txtG2Val, $slctFn2Val, $userObj->id);
          updateGoalFirstG2ObjFn($goalFirstG2ObjHiddenIdVal, $goalFirstG2Id, $goalFirstG2ObjVal, $goalFirstG2FnVal, $userObj->id);
        }
    }

    for($k=1; $k<=$goalFirstG3Ctr; $k++){
        $goalFirstG3ObjControlName = "edittxtgoalfirstg3obj" . $thId . $k;
        $goalFirstG3FnControlName = "editslctgoalfirstg3fn" . $thId . $k;
        $goalFirstG3ObjHiddenIdControlName = "hiddengoalfirstg3objid" . $thId . $k;
        $goalFirstG3ObjVal = $_POST["$goalFirstG3ObjControlName"];
        $goalFirstG3FnVal = $_POST["$goalFirstG3FnControlName"];
        $goalFirstG3ObjHiddenIdVal = $_POST["$goalFirstG3ObjHiddenIdControlName"];
        //now update the data value...
        if($userObj->user_level == '02'){
          updateGoalFirstG3($goalFirstG3Id, $goalFirstThId, $txtG3Val, $slctFn3Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalFirstG3ObjFn($goalFirstG3ObjHiddenIdVal, $goalFirstG3Id, $goalFirstG3ObjVal, $goalFirstG3FnVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          updateGoalFirstG3($goalFirstG3Id, $goalFirstThId, $txtG3Val, $slctFn3Val, $userObj->id);
          updateGoalFirstG3ObjFn($goalFirstG3ObjHiddenIdVal, $goalFirstG3Id, $goalFirstG3ObjVal, $goalFirstG3FnVal, $userObj->id);
        }
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Goal First Updated Successfully!</div>
