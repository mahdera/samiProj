<?php
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
    $numItemsG1 = $_POST['numItemG1'];
    $numItemsG2 = $_POST['numItemG2'];
    $numItemsG3 = $_POST['numItemG3'];
    //save the goalfirst object to the database...
    saveGoalFirst($thId);
    //fetch the value just saved using the thId
    $fetchedGoalFirst = getGoalFirstUsingThId($thId);
    //now save the goalfirstg1 value...
    saveGoalFirstG1($fetchedGoalFirst->id, $g1, $g1Fn);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalFirstG1 = getGoalFirstG1Using($fetchedGoalFirst->id, $g1, $g1Fn);
    
    
    for($i = 2; $i <= $numItemsG1; $i++){
        $g1ObjTextBoxId = "txtg1obj" + $i;
        $g1ObjTextBoxValue = $_POST["$g1ObjTextBoxId"];
        $g1FnSelectBoxId = "slctg1fn" + $i;
        $g1FnSelectBoxValue = $_POST["$g1FnSelectBoxId"];
        //now save the values to the database...
        saveGoalFirstG1ObjFn($fetchedGoalFirstG1->id, $g1ObjTextBoxValue, $g1FnSelectBoxValue);
    }//end for loop i
    
    //now do the same thing for G2
    saveGoalFirstG2($fetchedGoalFirst->id, $g2, $g2Fn);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalFirstG2 = getGoalFirstG2Using($fetchedGoalFirst->id, $g2, $g2Fn);
    
    for($j = 2; $j <= $numItemsG2; $j++){
        $g2ObjTextBoxId = "txtg2obj" + $j;
        $g2ObjTextBoxValue = $_POST["$g2ObjTextBoxId"];
        $g2FnSelectBoxId = "slctg2fn" + $j;
        $g2FnSelectBoxValue = $_POST["$g2FnSelectBoxId"];
        //now save the values to the database...
        saveGoalFirstG2ObjFn($fetchedGoalFirstG2->id, $g2ObjTextBoxValue, $g2FnSelectBoxValue);
    }//end for loop i
    
    //now do the same thing for G3
    
?>
