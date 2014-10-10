<?php
    require_once 'form1.php';
    require_once 'form1q3.php';
    require_once 'form1q4.php';
    
    $title = $_POST['title'];
    $formDate = $_POST['formDate'];    
    $plan = $_POST['plan'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3NumItems = $_POST['q3NumItems'];
    $q4NumItems = $_POST['q4NumItems'];   
    
    //now save form1 record to the database
    saveForm1($title, $formDate, $plan, $q1, $q2);
    //now fetch this particular record using the column/field values...
    $form1Obj = getForm1Using($title, $formDate);
    
    if($form1Obj != null){
        $form1Id = $form1Obj->id;
        $q3ValueArray = array();
        $q4ValueArray = array();
        
        for($i=1; $i <= $q3NumItems; $i++){
            $textBoxId = "txtrowq3" . $i;
            $textBoxIdVal = $_POST["$textBoxId"];
            $q3ValueArray[($i-1)] = $textBoxIdVal;            
        }//end for loop       
        
        //now save the record to form1q3 table using the array as intermidiary storage value...
        for($k=0; $k < count($q3ValueArray); $k++ ){
            $index = $k+1;
            if($index == 1){
                saveForm1Q3($form1Id, $q3ValueArray[$k], $q3ValueArray[$k+1], 
                    $q3ValueArray[$k+2], $q3ValueArray[$k+3], 
                    $q3ValueArray[$k+4], $q3ValueArray[$k+5]);
            }
            
            if($index % 6 == 0){
                saveForm1Q3($form1Id, $q3ValueArray[$k+1], $q3ValueArray[$k+2], 
                    $q3ValueArray[$k+3], $q3ValueArray[$k+4], 
                    $q3ValueArray[$k+5], $q3ValueArray[$k+6]);
            }
        }//end for loop
        
        for($j=1; $j <= $q4NumItems; $j++){
            $textBoxId = "txtrowq4" . $j;
            $textBoxIdVal = $_POST["$textBoxId"];
            $q4ValueArray[($i-1)] = $textBoxIdVal;                       
        }//end for loop
        
        for($m=0; $m < count($q4ValueArray); $m++){
            $index = $m+1;
            if($index == 1){
                saveForm1Q4($form1Id, $q4ValueArray[$m], $q4ValueArray[$m+1], 
                    $q4ValueArray[$m+2], $q4ValueArray[$m+3], 
                    $q4ValueArray[$m+4], $q4ValueArray[$m+5]);
            }
            
            if($index % 6 == 0){
                saveForm1Q4($form1Id, $q4ValueArray[$m+1], $q4ValueArray[$m+2], 
                    $q4ValueArray[$m+3], $q4ValueArray[$m+4], 
                    $q4ValueArray[$m+5], $q4ValueArray[$m+6]);
            }
        }//end for loop
        
    }///end if condition...
?>
