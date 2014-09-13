<?php
    require_once 'goalsecond.php';
    require_once 'goalsecondg1.php';    
    require_once 'goalsecondg2.php';    
    require_once 'goalsecondg3.php';
    
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
    saveGoalSecond($thId);
    //fetch the value just saved using the thId
    $fetchedGoalSecond = getGoalSecondUsingFnId($fnId);
    //now save the goalfirstg1 value...
    saveGoalSecondG1($fetchedGoalSecond->id, $g1);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalSecondG1 = getGoalSecondG1Using($fetchedGoalSecond->id, $g1);
    
    
    for($i = 2; $i <= $numItemsG1; $i++){
        $g1ObjTextBoxId = "txtg1obj" . $i;
        $g1ObjTextBoxValue = $_POST["$g1ObjTextBoxId"];        
        //now save the values to the database...
        saveGoalSecondG1Obj($fetchedGoalSecondG1->id, $g1ObjTextBoxValue);
    }//end for loop i
    
    //now do the same thing for G2
    saveGoalSecondG2($fetchedGoalFirst->id, $g2);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalSecondG2 = getGoalSecondG2Using($fetchedGoalFirst->id, $g2);
    
    for($j = 2; $j <= $numItemsG2; $j++){
        $g2ObjTextBoxId = "txtg2obj" . $j;
        $g2ObjTextBoxValue = $_POST["$g2ObjTextBoxId"];        
        //now save the values to the database...
        saveGoalSecondG2Obj($fetchedGoalFirstG2->id, $g2ObjTextBoxValue);
    }//end for loop i
    
    //now do the same thing for G3
    saveGoalSecondG3($fetchedGoalFirst->id, $g3);
    //fetch the value using the above parameters you have used to save the values to the database...
    $fetchedGoalSecondG3 = getGoalSecondG3Using($fetchedGoalFirst->id, $g3);
    
    for($k = 2; $k <= $numItemsG3; $k++){
        $g3ObjTextBoxId = "txtg3obj" . $k;
        $g3ObjTextBoxValue = $_POST["$g3ObjTextBoxId"];        
        //now save the values to the database...
        saveGoalSecondG3ObjFn($fetchedGoalFirstG3->id, $g3ObjTextBoxValue);
    }//end for loop i
?>
