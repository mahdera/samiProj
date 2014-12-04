<?php
    session_start();
    $assessmentType = addslashes($_POST['assessmentType']);
    $assessmentDate = addslashes($_POST['assessmentDate']);
    $summary = addslashes($_POST['summary']);
    $numItems = addslashes($_POST['numItems']);

    require_once 'th.php';
    require_once 'assessment.php';
    require_once 'assessmentth.php';
    require_once 'user.php';

    //now get the added text boxe's values from the dataString variable and add the th values to the database
    for($i=1; $i <= $numItems; $i++){
        $thControlName = "txtth" . $i;
        $thValue = $_POST["$thControlName"];

        //now save pk of the two tables to the assessmentth table...
        if($_SESSION['USER_ROLE_CODE'] === '01A'){
          $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          saveAssessment($assessmentType, $assessmentDate, $summary, $userObject->id);
          $fetchedAssessment = getAssessmentUsing($assessmentType, $assessmentDate);
          saveTh($thValue, $userObject->id);
          $fetchedTh = getThUsing($thValue);
          saveAssessmentTh($fetchedAssessment->id, $fetchedTh->id, $userObject->id);
        }else{
          saveAssessment($assessmentType, $assessmentDate, $summary, $_SESSION['LOGGED_USER_ID']);
          $fetchedAssessment = getAssessmentUsing($assessmentType, $assessmentDate);
          saveTh($thValue, $_SESSION['LOGGED_USER_ID']);
          $fetchedTh = getThUsing($thValue);
          saveAssessmentTh($fetchedAssessment->id, $fetchedTh->id, $_SESSION['LOGGED_USER_ID']);
        }
    }//end for loop


    //now save the assessmentth table.
    //first get the newly saved
?>
