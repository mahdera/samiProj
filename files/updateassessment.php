<?php
    session_start();
    require_once 'assessment.php';
    require_once 'th.php';

    @$assessmentType = mysql_real_escape_string($_POST['assessmentType']);
    $assessmentDate = $_POST['assessmentDate'];
    @$summary = mysql_real_escape_string($_POST['summary']);
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
        updateTh($thIdControlValue, $thControlValue, $_SESSION['LOGGED_USER_ID']);
    }//end for loop
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Assessment Successfully Updated!</div>
