<?php
    session_start();
    require_once 'thaction.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';

    $updatedText = $_POST['updatedText'];
    $thActionId = $_POST['thActionId'];
    $txtG1Val = $_POST['txtG1Val'];
    $slctFn1Val = $_POST['slctFn1Val'];
    $txtG2Val = $_POST['txtG2Val'];
    $slctFn2Val = $_POST['slctFn2Val'];
    $txtG3Val = $_POST['txtG3Val'];
    $slctFn3Val = $_POST['slctFn3Val'];
    $goalFirstG1Id = $_POST['goalFirstG1Id'];
    $goalFirstG1ObjFnId = $_POST['goalFirstG1ObjFnId'];
    $goalFirstG2Id = $_POST['goalFirstG2Id'];
    $goalFirstG2ObjFnId = $_POST['goalFirstG2ObjFnId'];
    $goalFirstG3Id = $_POST['goalFirstG3Id'];
    $goalFirstG3ObjFnId = $_POST['goalFirstG3ObjFnId'];
    $goalFirstG1Ctr = $_POST['goalFirstG1Ctr'];
    $goalFirstG2Ctr = $_POST['goalFirstG2Ctr'];
    $goalFirstG3Ctr = $_POST['goalFirstG3Ctr'];
    $goalFirstId = $_POST['goalFirstId'];

    for($i=1; $i<=$goalFirstG1Ctr; $i++){
        $goalFirstG1ObjControlName = "txtgoalfirstg1obj" . $i;
        $goalFirstG1FnControlName = "slctgoalfirstg1fn" . $i;
        $goalFirstG1ObjVal = $_POST["$goalFirstG1ObjControlName"];
        $goalFirstG1FnVal = $_POST["$goalFirstG1FnControlName"];
        //now update the data value...
        updateGoalFirstG1($goalFirstG1Id, $goalFirstId, $txtG1Val, $slctFn1Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalFirstG1ObjFn($goalFirstG1ObjFnId, $goalFirstG1Id, $goalFirstG1ObjVal, $goalFirstG1FnVal, $_SESSION['LOGGED_USER_ID']);
    }

    for($j=1; $j<=$goalFirstG2Ctr; $j++){
        $goalFirstG2ObjControlName = "txtgoalfirstg2obj" . $j;
        $goalFirstG2FnControlName = "slctgoalfirstg2fn" . $j;
        $goalFirstG2ObjVal = $_POST["$goalFirstG2ObjControlName"];
        $goalFirstG2FnVal = $_POST["$goalFirstG2FnControlName"];
        //now update the data value...
        updateGoalFirstG2($goalFirstG2Id, $goalFirstId, $txtG2Val, $slctFn2Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalFirstG2ObjFn($goalFirstG2ObjFnId, $goalFirstG2Id, $goalFirstG2ObjVal, $goalFirstG2FnVal, $_SESSION['LOGGED_USER_ID']);
    }

    for($k=1; $k<=$goalFirstG3Ctr; $k++){
        $goalFirstG3ObjControlName = "txtgoalfirstg3obj" . $k;
        $goalFirstG3FnControlName = "slctgoalfirstg3fn" . $k;
        $goalFirstG3ObjVal = $_POST["$goalFirstG3ObjControlName"];
        $goalFirstG3FnVal = $_POST["$goalFirstG3FnControlName"];
        //now update the data value...
        updateGoalFirstG3($goalFirstG3Id, $goalFirstId, $txtG3Val, $slctFn3Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalFirstG3ObjFn($goalFirstG3ObjFnId, $goalFirstG3Id, $goalFirstG3ObjVal, $goalFirstG3FnVal, $_SESSION['LOGGED_USER_ID']);
    }

    
    updateThAction($thActionId, $updatedText, $_SESSION['LOGGED_USER_ID']);
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Th Action Updated Successfully!</div>
