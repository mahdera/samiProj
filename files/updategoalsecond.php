<?php
    session_start();
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg3obj.php';
    require_once 'goalsecondfn.php';

    $fnId = $_POST['fnId'];
    $txtG1Val = mysql_real_escape_string($_POST['txtG1Val']);
    $txtG2Val = mysql_real_escape_string($_POST['txtG2Val']);
    $txtG3Val = mysql_real_escape_string($_POST['txtG3Val']);
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

    for($i=1; $i<=$goalSecondG1Ctr; $i++){
        $goalSecondG1ObjControlName = "edittxtgoalsecondg1obj" . $fnId . $i;
        $goalSecondG1ObjHiddenIdControlName = "hiddengoalsecondg1objid" . $fnId . $i;
        $goalSecondG1ObjVal = mysql_real_escape_string($_POST["$goalSecondG1ObjControlName"]);
        $goalSecondG1ObjHiddenIdVal = $_POST["$goalSecondG1ObjHiddenIdControlName"];
        //now update the data value...
        updateGoalSecondG1($goalSecondG1Id, $goalSecondFnId, $txtG1Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalSecondG1Obj($goalSecondG1ObjHiddenIdVal, $goalSecondG1Id, $goalSecondG1ObjVal, $_SESSION['LOGGED_USER_ID']);
    }

    for($j=1; $j<=$goalSecondG2Ctr; $j++){
        $goalSecondG2ObjControlName = "edittxtgoalsecondg2obj" . $fnId . $j;
        $goalSecondG2ObjHiddenIdControlName = "hiddengoalsecondg2objid" . $fnId . $j;
        $goalSecondG2ObjVal = mysql_real_escape_string($_POST["$goalSecondG2ObjControlName"]);
        $goalSecondG2ObjHiddenIdVal = $_POST["$goalSecondG2ObjHiddenIdControlName"];
        //now update the data value...
        updateGoalSecondG2($goalSecondG2Id, $goalSecondFnId, $txtG2Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalSecondG2Obj($goalSecondG2ObjHiddenIdVal, $goalSecondG2Id, $goalSecondG2ObjVal, $_SESSION['LOGGED_USER_ID']);
    }

    for($k=1; $k<=$goalSecondG3Ctr; $k++){
        $goalSecondG3ObjControlName = "edittxtgoalsecondg3obj" . $fnId . $k;
        $goalSecondG3ObjHiddenIdControlName = "hiddengoalsecondg3objid" . $fnId . $k;
        $goalSecondG3ObjVal = mysql_real_escape_string($_POST["$goalSecondG3ObjControlName"]);
        $goalSecondG3ObjHiddenIdVal = $_POST["$goalSecondG3ObjHiddenIdControlName"];
        //now update the data value...
        updateGoalSecondG3($goalSecondG3Id, $goalSecondFnId, $txtG3Val, $_SESSION['LOGGED_USER_ID']);
        updateGoalSecondG3Obj($goalSecondG3ObjHiddenIdVal, $goalSecondG3Id, $goalSecondG3ObjVal, $_SESSION['LOGGED_USER_ID']);
    }
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Goal Second Updated Successfully!</div>
