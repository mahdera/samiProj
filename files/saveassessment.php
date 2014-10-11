<?php
    session_start();
    $assessmentType = $_POST['assessmentType'];
    $assessmentDate = $_POST['assessmentDate'];
    $summary = $_POST['summary'];
    $numItems = $_POST['numItems'];
    
    require_once 'th.php';
    require_once 'assessment.php';
    require_once 'assessmentth.php';
    
    //then save the assessment in the database
    saveAssessment($assessmentType, $assessmentDate, $summary, $_SESSION['LOGGED_USER_ID']);
    //get the saved assessment record back from the database...
    $fetchedAssessment = getAssessmentUsing($assessmentType, $assessmentDate);
    
    //now get the added text boxe's values from the dataString variable and add the th values to the database
    for($i=1; $i <= $numItems; $i++){
        $thControlName = "txtth" . $i;
        $thValue = $_POST["$thControlName"];
        
        saveTh($thValue, $_SESSION['LOGGED_USER_ID']);
        //get the newly saved th from the database
        $fetchedTh = getThUsing($thValue);
        //now save pk of the two tables to the assessmentth table...
        saveAssessmentTh($fetchedAssessment->id, $fetchedTh->id, $_SESSION['LOGGED_USER_ID']);
    }//end for loop
    
    
    //now save the assessmentth table.
    //first get the newly saved 
?>
