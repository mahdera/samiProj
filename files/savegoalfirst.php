<?php
    session_start();
    require_once 'goalfirst.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';
    //get the values...
    $thId = $_POST['th'];
    $g1 = $_POST['g1'];
    $g1Fn = $_POST['g1Fn'];
    $g1Obj1 = $_POST['g1Obj1'];
    $g1Fn1 = $_POST['g1Fn1'];
    $g2 = $_POST['g2'];
    $g2Fn = $_POST['g2Fn'];
    $g2Obj1 = $_POST['g2Obj1'];
    $g2Fn1 = $_POST['g2Fn1'];
    $g3 = $_POST['g3'];
    $g3Fn = $_POST['g3Fn'];
    $g3Obj1 = $_POST['g3Obj1'];
    $g3Fn1 = $_POST['g3Fn1'];
    $numItemsG1 = $_POST['numItemsG1'];
    $numItemsG2 = $_POST['numItemsG2'];
    $numItemsG3 = $_POST['numItemsG3'];
    //save the goalfirst object to the database...
    saveGoalFirst($thId, $_SESSION['LOGGED_USER_ID']);
    //fetch the value just saved using the thId
    $fetchedGoalFirst = getGoalFirstUsingThIdAndModifiedBy($thId, $_SESSION['LOGGED_USER_ID']);
    //now save the goalfirstg1 value...
    saveGoalFirstG1($fetchedGoalFirst->id, $g1, $g1Fn, $_SESSION['LOGGED_USER_ID']);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalFirstG1 = getGoalFirstG1UsingAndModifiedBy($fetchedGoalFirst->id, $g1, $g1Fn, $_SESSION['LOGGED_USER_ID']);
    
    
    for($i = 1; $i <= $numItemsG1; $i++){
        $g1ObjTextBoxId = "txtg1obj" . $i;
        $g1ObjTextBoxValue = $_POST["$g1ObjTextBoxId"];
        $g1FnSelectBoxId = "slctg1fn" . $i;
        $g1FnSelectBoxValue = $_POST["$g1FnSelectBoxId"];
        //now save the values to the database...
        saveGoalFirstG1ObjFn($fetchedGoalFirstG1->id, $g1ObjTextBoxValue, $g1FnSelectBoxValue, $_SESSION['LOGGED_USER_ID']);
    }//end for loop i
    
    //now do the same thing for G2
    saveGoalFirstG2($fetchedGoalFirst->id, $g2, $g2Fn, $_SESSION['LOGGED_USER_ID']);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalFirstG2 = getGoalFirstG2UsingAndModifiedBy($fetchedGoalFirst->id, $g2, $g2Fn, $_SESSION['LOGGED_USER_ID']);
    
    for($j = 1; $j <= $numItemsG2; $j++){
        $g2ObjTextBoxId = "txtg2obj" . $j;
        $g2ObjTextBoxValue = $_POST["$g2ObjTextBoxId"];
        $g2FnSelectBoxId = "slctg2fn" . $j;
        $g2FnSelectBoxValue = $_POST["$g2FnSelectBoxId"];
        //now save the values to the database...
        saveGoalFirstG2ObjFn($fetchedGoalFirstG2->id, $g2ObjTextBoxValue, $g2FnSelectBoxValue, $_SESSION['LOGGED_USER_ID']);
    }//end for loop i
    
    //now do the same thing for G3
    saveGoalFirstG3($fetchedGoalFirst->id, $g3, $g3Fn, $_SESSION['LOGGED_USER_ID']);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalFirstG3 = getGoalFirstG3UsingAndModifiedBy($fetchedGoalFirst->id, $g3, $g3Fn, $_SESSION['LOGGED_USER_ID']);
    
    for($k = 1; $k <= $numItemsG3; $k++){
        $g3ObjTextBoxId = "txtg3obj" . $k;
        $g3ObjTextBoxValue = $_POST["$g3ObjTextBoxId"];
        $g3FnSelectBoxId = "slctg3fn" . $k;
        $g3FnSelectBoxValue = $_POST["$g3FnSelectBoxId"];
        //now save the values to the database...
        saveGoalFirstG3ObjFn($fetchedGoalFirstG3->id, $g3ObjTextBoxValue, $g3FnSelectBoxValue, $_SESSION['LOGGED_USER_ID']);
    }//end for loop i
?>
