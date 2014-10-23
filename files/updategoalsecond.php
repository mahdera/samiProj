<?php
    session_start();
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg3obj.php';

    $fnId = $_POST['fnId'];
    $txtG1Val = $_POST['txtG1Val'];
    $txtG2Val = $_POST['txtG2Val'];
    $txtG3Val = $_POST['txtG3Val'];
    $goalSecondG1Id = $_POST['goalSecondG1Id'];
    $goalSecondG1ObjId = $_POST['goalSecondG1ObjId'];
    $goalSecondG2Id = $_POST['goalSecondG2Id'];
    $goalSecondG2ObjId = $_POST['goalSecondG2ObjId'];
    $goalSecondG3Id = $_POST['goalSecondG3Id'];
    $goalSecondG3ObjId = $_POST['goalSecondG3ObjId'];
    $goalSecondId = $_POST['goalSecondId'];
    $goalSecondG1Ctr = $_POST['goalSecondG1Ctr'];
    $goalSecondG2Ctr = $_POST['goalSecondG2Ctr'];
    $goalSecondG3Ctr = $_POST['goalSecondG3Ctr'];

    for($i=1; $i<=$goalSecondG1Ctr; $i++){
        $goalSecondG1ObjControlName = "edittxtgoalsecondg1obj" . $fnId . $i;
        $goalSecondG1ObjVal = $_POST["$goalSecondG1ObjControlName"];
        //now update the data value...
        updateGoalSecondG1($goalSecondG1Id, $goalSecondId, $txtG1Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalSecondG1Obj($goalSecondG1ObjId, $goalSecondG1Id, $goalSecondG1ObjVal, $_SESSION['LOGGED_USER_ID']);
    }

    for($j=1; $j<=$goalSecondG2Ctr; $j++){
        $goalSecondG2ObjControlName = "edittxtgoalsecondg2obj" . $fnId . $j;
        $goalSecondG2ObjVal = $_POST["$goalSecondG2ObjControlName"];
        //now update the data value...
        updateGoalSecondG2($goalSecondG2Id, $goalSecondId, $txtG2Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalSecondG2Obj($goalSecondG2ObjId, $goalSecondG2Id, $goalSecondG2ObjVal, $_SESSION['LOGGED_USER_ID']);
    }

    for($k=1; $k<=$goalSecondG3Ctr; $k++){
        $goalSecondG3ObjControlName = "edittxtgoalsecondg3obj" . $fnId . $k;
        $goalSecondG3ObjVal = $_POST["$goalSecondG3ObjControlName"];
        //now update the data value...
        updateGoalSecondG3($goalSecondG3Id, $goalSecondId, $txtG3Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalSecondG3Obj($goalSecondG3ObjId, $goalSecondG3Id, $goalSecondG3ObjVal, $_SESSION['LOGGED_USER_ID']);
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Goal Second Updated Successfully!</div>