<?php
    session_start();
    require_once 'goalsecond.php';
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3obj.php';

    //get the values...
    $fnId = $_POST['fn'];
    $g1 = $_POST['g1'];
    $g1Obj1 = $_POST['g1Obj1'];
    $g2 = $_POST['g2'];
    $g2Obj1 = $_POST['g2Obj1'];
    $g3 = $_POST['g3'];
    $g3Obj1 = $_POST['g3Obj1'];

    $numItemsG1 = $_POST['numItemsG1'];
    $numItemsG2 = $_POST['numItemsG2'];
    $numItemsG3 = $_POST['numItemsG3'];
    //save the goalfirst object to the database...
    saveGoalSecond($fnId, $_SESSION['LOGGED_USER_ID']);
    //fetch the value just saved using the thId
    $fetchedGoalSecond = getGoalSecondUsingFnIdAndModifiedBy($fnId,$_SESSION['LOGGED_USER_ID']);
    //now save the goalfirstg1 value...
    saveGoalSecondG1($fetchedGoalSecond->id, $g1, $_SESSION['LOGGED_USER_ID']);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalSecondG1 = getGoalSecondG1UsingAndModifiedBy($fetchedGoalSecond->id, $g1, $_SESSION['LOGGED_USER_ID']);


    for($i = 1; $i <= $numItemsG1; $i++){
        $g1ObjTextBoxId = "txtg1obj" . $i;
        $g1ObjTextBoxValue = $_POST["$g1ObjTextBoxId"];
        //now save the values to the database...
        saveGoalSecondG1Obj($fetchedGoalSecondG1->id, $g1ObjTextBoxValue, $_SESSION['LOGGED_USER_ID']);
    }//end for loop i

    //now do the same thing for G2
    saveGoalSecondG2($fetchedGoalSecond->id, $g2, $_SESSION['LOGGED_USER_ID']);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalSecondG2 = getGoalSecondG2UsingAndModifiedBy($fetchedGoalSecond->id, $g2, $_SESSION['LOGGED_USER_ID']);

    for($j = 1; $j <= $numItemsG2; $j++){
        $g2ObjTextBoxId = "txtg2obj" . $j;
        $g2ObjTextBoxValue = $_POST["$g2ObjTextBoxId"];
        //now save the values to the database...
        saveGoalSecondG2Obj($fetchedGoalSecondG2->id, $g2ObjTextBoxValue, $_SESSION['LOGGED_USER_ID']);
    }//end for loop i

    //now do the same thing for G3
    saveGoalSecondG3($fetchedGoalSecond->id, $g3, $_SESSION['LOGGED_USER_ID']);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalSecondG3 = getGoalSecondG3UsingAndModifiedBy($fetchedGoalSecond->id, $g3, $_SESSION['LOGGED_USER_ID']);

    for($k = 1; $k <= $numItemsG3; $k++){
        $g3ObjTextBoxId = "txtg3obj" . $k;
        $g3ObjTextBoxValue = $_POST["$g3ObjTextBoxId"];
        //now save the values to the database...
        saveGoalSecondG3Obj($fetchedGoalSecondG3->id, $g3ObjTextBoxValue, $_SESSION['LOGGED_USER_ID']);
    }//end for loop i
?>
