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
    require_once 'thaction.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $userObject = null;

    $thId = $_POST['thId'];
    $txtG1Val = addslashes($_POST['txtG1Val']);
    $slctFn1Val = addslashes($_POST['slctFn1Val']);
    $txtG2Val = addslashes($_POST['txtG2Val']);
    $slctFn2Val = addslashes($_POST['slctFn2Val']);
    $txtG3Val = addslashes($_POST['txtG3Val']);
    $slctFn3Val = addslashes($_POST['slctFn3Val']);
    $goalFirstG1Id = $_POST['goalFirstG1Id'];
    $goalFirstG2Id = $_POST['goalFirstG2Id'];
    $goalFirstG3Id = $_POST['goalFirstG3Id'];
    $goalFirstG1Ctr = $_POST['goalFirstG1Ctr'];
    $goalFirstG2Ctr = $_POST['goalFirstG2Ctr'];
    $goalFirstG3Ctr = $_POST['goalFirstG3Ctr'];
    $goalFirstThId = $_POST['goalFirstThId'];
    $thActionControlName = "textareathaction" . $thId;
    if(isset($_POST[$thActionControlName])){
        $thActionVal = $_POST[$thActionControlName];
    }

    //This is done to refine the logic...a lot faster and safer...
    if($userObj->user_level == '02'){
        $userObject = $userObj;
    }else if($userObj->user_level == '01'){
        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    }
    //here $userObject will contain the approproate user object for both 01 and 02 type of user_level
    /////////////////

    for($i=1; $i<=$goalFirstG1Ctr; $i++){
        $goalFirstG1ObjControlName = "edittxtgoalfirstg1obj" . $thId . $i;
        $goalFirstG1FnControlName = "editslctgoalfirstg1fn" . $thId . $i;
        $goalFirstG1ObjHiddenIdControlName = "hiddengoalfirstg1objid" . $thId . $i;
        $goalFirstG1ObjVal = $_POST["$goalFirstG1ObjControlName"];
        $goalFirstG1FnVal = $_POST["$goalFirstG1FnControlName"];
        $goalFirstG1ObjHiddenIdVal = $_POST["$goalFirstG1ObjHiddenIdControlName"];
        //now update the data value...
        /*if($userObj->user_level == '02'){
          updateGoalFirstG1($goalFirstG1Id, $goalFirstThId, $txtG1Val, $slctFn1Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalFirstG1ObjFn($goalFirstG1ObjHiddenIdVal, $goalFirstG1Id, $goalFirstG1ObjVal, $goalFirstG1FnVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObject)){*/
            updateGoalFirstG1($goalFirstG1Id, $goalFirstThId, $txtG1Val, $slctFn1Val, $userObject->id);
            updateGoalFirstG1ObjFn($goalFirstG1ObjHiddenIdVal, $goalFirstG1Id, $goalFirstG1ObjVal, $goalFirstG1FnVal, $userObject->id);
          /*}
      }*/
    }//end for loop

    //for the added functionality at Sami's house.
    $g1AddedItems = intval($_POST['g1AddedItems']);
    if($g1AddedItems != 0){
        for($i=2; $i<=($g1AddedItems + 1); $i++){
            $g1ObjControlName = "txtg1obj" . $i;
            $g1FnControlName = "slctg1fn" . $i;
            //now get the values...
            $g1ObjVal = $_POST["$g1ObjControlName"];
            $g1FnVal = $_POST["$g1FnControlName"];
            //now save this record to the database...
            saveGoalFirstG1ObjFn($goalFirstG1Id, $g1ObjVal, $g1FnVal, $userObject->id);
        }//end for...loop
    }//end if condition

    for($j=1; $j<=$goalFirstG2Ctr; $j++){
        $goalFirstG2ObjControlName = "edittxtgoalfirstg2obj" . $thId . $j;
        $goalFirstG2FnControlName = "editslctgoalfirstg2fn" . $thId . $j;
        $goalFirstG2ObjHiddenIdControlName = "hiddengoalfirstg2objid" . $thId . $j;
        $goalFirstG2ObjVal = $_POST["$goalFirstG2ObjControlName"];
        $goalFirstG2FnVal = $_POST["$goalFirstG2FnControlName"];
        $goalFirstG2ObjHiddenIdVal = $_POST["$goalFirstG2ObjHiddenIdControlName"];
        //now update the data value...
        /*if($userObj->user_level == '02'){
          updateGoalFirstG2($goalFirstG2Id, $goalFirstThId, $txtG2Val, $slctFn2Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalFirstG2ObjFn($goalFirstG2ObjHiddenIdVal, $goalFirstG2Id, $goalFirstG2ObjVal, $goalFirstG2FnVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObj)){*/
            updateGoalFirstG2($goalFirstG2Id, $goalFirstThId, $txtG2Val, $slctFn2Val, $userObject->id);
            updateGoalFirstG2ObjFn($goalFirstG2ObjHiddenIdVal, $goalFirstG2Id, $goalFirstG2ObjVal, $goalFirstG2FnVal, $userObject->id);
          /*}
      }*/
    }//end for...loop

    //for the added functionality at Sami's house.
    $g2AddedItems = intval($_POST['g2AddedItems']);
    if($g2AddedItems != 0){
        for($i=2; $i<=($g2AddedItems + 1); $i++){
            $g2ObjControlName = "txtg2obj" . $i;
            $g2FnControlName = "slctg2fn" . $i;
            //now get the values...
            $g2ObjVal = $_POST["$g2ObjControlName"];
            $g2FnVal = $_POST["$g2FnControlName"];
            //now save this record to the database...
            saveGoalFirstG2ObjFn($goalFirstG2Id, $g2ObjVal, $g2FnVal, $userObject->id);
        }//end for...loop
    }//end if condition

    for($k=1; $k<=$goalFirstG3Ctr; $k++){
        $goalFirstG3ObjControlName = "edittxtgoalfirstg3obj" . $thId . $k;
        $goalFirstG3FnControlName = "editslctgoalfirstg3fn" . $thId . $k;
        $goalFirstG3ObjHiddenIdControlName = "hiddengoalfirstg3objid" . $thId . $k;
        $goalFirstG3ObjVal = $_POST["$goalFirstG3ObjControlName"];
        $goalFirstG3FnVal = $_POST["$goalFirstG3FnControlName"];
        $goalFirstG3ObjHiddenIdVal = $_POST["$goalFirstG3ObjHiddenIdControlName"];
        //now update the data value...
        /*if($userObj->user_level == '02'){
          updateGoalFirstG3($goalFirstG3Id, $goalFirstThId, $txtG3Val, $slctFn3Val, $_SESSION['LOGGED_USER_ID']);
          updateGoalFirstG3ObjFn($goalFirstG3ObjHiddenIdVal, $goalFirstG3Id, $goalFirstG3ObjVal, $goalFirstG3FnVal, $_SESSION['LOGGED_USER_ID']);
        }else if($userObj->user_level == '01'){
          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObj)){*/
            updateGoalFirstG3($goalFirstG3Id, $goalFirstThId, $txtG3Val, $slctFn3Val, $userObject->id);
            updateGoalFirstG3ObjFn($goalFirstG3ObjHiddenIdVal, $goalFirstG3Id, $goalFirstG3ObjVal, $goalFirstG3FnVal, $userObject->id);
          /*}
      }*/
    }//end for...loop

    //for the added functionality at Sami's house.
    $g3AddedItems = intval($_POST['g3AddedItems']);
    if($g3AddedItems != 0){
        for($i=2; $i<=($g3AddedItems + 1); $i++){
            $g3ObjControlName = "txtg3obj" . $i;
            $g3FnControlName = "slctg3fn" . $i;
            //now get the values...
            $g3ObjVal = $_POST["$g3ObjControlName"];
            $g3FnVal = $_POST["$g3FnControlName"];
            //now save this record to the database...
            saveGoalFirstG3ObjFn($goalFirstG3Id, $g3ObjVal, $g3FnVal, $userObject->id);
        }//end for...loop
    }//end if condition

    //now update the th action in here...
    if( isset($_POST[$thActionControlName]) ){
        updateThActionForTh($thId, $thActionVal);
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Updated Successfully</div>
