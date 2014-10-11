<?php
    session_start();
    require_once 'assessment.php';
    require_once 'th.php';
    
    $assessmentType = $_POST['assessmentType'];
    $assessmentDate = $_POST['assessmentDate'];
    $summary = $_POST['summary'];
    $id = $_POST['id'];
    $ctr = $_POST['ctr'];
    //now do the assessment update in here...
    updateAssessment($id, $assessmentType, $assessmentDate, $summary, $_SESSION['LOGGED_USER_ID']);
    //now get the iterative values
    for($i=1; $i <= $ctr; $i++){
        $thControlName = "txteditth" . $id . $i;
        $thControlValue = $_POST["$thControlName"];
        $thIdControlName = "txteditthid" . $id . $i;
        $thIdControlValue = $_POST["$thIdControlName"];
        //now do the update as per the number of th rows in the assessment form or record...
        updateTh($thIdControlValue, $thControlValue);
    }//end for loop
?>
<p style="background:lightgreen">
    Assessment Successfully Updated!
</p>