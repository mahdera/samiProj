<?php
    session_start();
    require_once 'form1.php';
    require_once 'form1q3.php';
    require_once 'form1q4.php';
    require_once 'user.php';

    $title = addslashes($_POST['title']);
    $formDate = addslashes($_POST['formDate']);
    $plan = addslashes($_POST['plan']);
    $q1 = addslashes($_POST['q1']);
    $q2 = addslashes($_POST['q2']);
    $q3NumRows = $_POST['q3NumRows'];
    $q4NumRows = $_POST['q4NumRows'];

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    if($userObj->user_level == '01'){
        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        saveForm1($title, $formDate, $plan, $q1, $q2, $userObject->id);
    }else if($userObj->user_level == '02'){
        saveForm1($title, $formDate, $plan, $q1, $q2, $_SESSION['LOGGED_USER_ID']);
    }
    //get the max id from tbl_form_1 for current logged in user
    $maxForm1Id = 0;
    if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      $maxForm1Id = getMaxFormIdForUser($userObject->id);
    }else if($userObj->user_level == '02'){
      $maxForm1Id = getMaxFormIdForUser($_SESSION['LOGGED_USER_ID']);
    }
    //now fetch this particular record using id value of the form1 record
    $form1Obj = getForm1($maxForm1Id);

    if($form1Obj != null){
        $form1Id = $form1Obj->id;
        $q3ValueArray = array();
        $q4ValueArray = array();

        for($i=1; $i <= $q3NumRows; $i++){
            $textBoxCol1Id = "txtrowq3" . $i . 1;
            $textBoxCol2Id = "txtrowq3" . $i . 2;
            $textBoxCol3Id = "txtrowq3" . $i . 3;
            $textBoxCol4Id = "txtrowq3" . $i . 4;

            $textBoxCol1Val = mysql_real_escape_string($_POST["$textBoxCol1Id"]);
            $textBoxCol2Val = mysql_real_escape_string($_POST["$textBoxCol2Id"]);
            $textBoxCol3Val = mysql_real_escape_string($_POST["$textBoxCol3Id"]);
            $textBoxCol4Val = mysql_real_escape_string($_POST["$textBoxCol4Id"]);
            if($userObj->user_level == '01'){
              $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
              saveForm1Q3($form1Id, $i, 1, $textBoxCol1Val, $userObject->id);
              saveForm1Q3($form1Id, $i, 2, $textBoxCol2Val, $userObject->id);
              saveForm1Q3($form1Id, $i, 3, $textBoxCol3Val, $userObject->id);
              saveForm1Q3($form1Id, $i, 4, $textBoxCol4Val, $userObject->id);
            }else if($userObj->user_level == '02'){
              saveForm1Q3($form1Id, $i, 1, $textBoxCol1Val, $_SESSION['LOGGED_USER_ID']);
              saveForm1Q3($form1Id, $i, 2, $textBoxCol2Val, $_SESSION['LOGGED_USER_ID']);
              saveForm1Q3($form1Id, $i, 3, $textBoxCol3Val, $_SESSION['LOGGED_USER_ID']);
              saveForm1Q3($form1Id, $i, 4, $textBoxCol4Val, $_SESSION['LOGGED_USER_ID']);
            }
        }//end for loop

        for($i=1; $i <= $q4NumRows; $i++){
            $textBoxCol1Id = "txtrowq4" . $i . 1;
            $textBoxCol2Id = "txtrowq4" . $i . 2;
            $textBoxCol3Id = "txtrowq4" . $i . 3;
            $textBoxCol4Id = "txtrowq4" . $i . 4;

            $textBoxCol1Val = mysql_real_escape_string($_POST["$textBoxCol1Id"]);
            $textBoxCol2Val = mysql_real_escape_string($_POST["$textBoxCol2Id"]);
            $textBoxCol3Val = mysql_real_escape_string($_POST["$textBoxCol3Id"]);
            $textBoxCol4Val = mysql_real_escape_string($_POST["$textBoxCol4Id"]);

            if($userObj->user_level == '01'){
              $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
              saveForm1Q4($form1Id, $i, 1, $textBoxCol1Val, $userObject->id);
              saveForm1Q4($form1Id, $i, 2, $textBoxCol2Val, $userObject->id);
              saveForm1Q4($form1Id, $i, 3, $textBoxCol3Val, $userObject->id);
              saveForm1Q4($form1Id, $i, 4, $textBoxCol4Val, $userObject->id);
            }else if($userObj->user_level == '02'){
              saveForm1Q4($form1Id, $i, 1, $textBoxCol1Val, $_SESSION['LOGGED_USER_ID']);
              saveForm1Q4($form1Id, $i, 2, $textBoxCol2Val, $_SESSION['LOGGED_USER_ID']);
              saveForm1Q4($form1Id, $i, 3, $textBoxCol3Val, $_SESSION['LOGGED_USER_ID']);
              saveForm1Q4($form1Id, $i, 4, $textBoxCol4Val, $_SESSION['LOGGED_USER_ID']);
            }
        }//end for loop

    }///end if condition...
?>
