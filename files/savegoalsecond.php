<?php
    session_start();
    require_once 'goalsecond.php';
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3obj.php';
    require_once 'goalsecondfn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    //get the values...
    $fnId = $_POST['fn'];
    @$g1 = mysql_real_escape_string($_POST['g1']);
    @$g1Obj1 = mysql_real_escape_string($_POST['g1Obj1']);
    @$g2 = mysql_real_escape_string($_POST['g2']);
    @$g2Obj1 = mysql_real_escape_string($_POST['g2Obj1']);
    @$g3 = mysql_real_escape_string($_POST['g3']);
    @$g3Obj1 = mysql_real_escape_string($_POST['g3Obj1']);

    $numItemsG1 = $_POST['numItemsG1'];
    $numItemsG2 = $_POST['numItemsG2'];
    $numItemsG3 = $_POST['numItemsG3'];

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    //$fetchedGoalSecondRecord = getGoalSecondUsingModifiedBy($_SESSION['LOGGED_USER_ID']);
    //$dateDifference = getDateDifferenceForGoalSecondUsingModifiedBy($_SESSION['LOGGED_USER_ID']);
    //echo "the date diff is : " . $dateDifference;

    if($userObj->user_level == '02'){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      $dateDifference = getDateDifferenceForGoalSecondUsingModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
      $dateDifference = getDateDifferenceForGoalSecondUsingModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }

    if(is_numeric($dateDifference)){
        if($dateDifference > 180){
            //last created goalFirst record is older than 6 months...hence create new...
            $_SESSION['GOAL_SECOND_STATUS'] = 'create';
        }else{
            $_SESSION['GOAL_SECOND_STATUS'] = 'existing';
        }
    }else{
        $_SESSION['GOAL_SECOND_STATUS'] = 'create';
    }

    if($_SESSION['GOAL_SECOND_STATUS'] == 'create'){
        //only create a goal first record iff user has logged in & is trying to
        //create a new goal_first record or did not click on the next butto.
        //if user is click save and tries to save another th without clicking the
        //next button it should grab the last goal first record saved by the current user.
        if($userObj->user_level == '01'){
            //now get any user who is in this sub district and currently active status
            $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
            saveGoalSecond($userObject->id);
        }else if($userObj->user_level == '02'){
            saveGoalSecond($_SESSION['LOGGED_USER_ID']);
        }

        $_SESSION['GOAL_SECOND_STATUS'] = 'existing';
    }

    if($userObj->user_level == '01'){
        //fetch the value just saved using the thId
        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
        //a call to the new method which will consider data sharing...
        $fetchedGoalSecond = getGoalSecondUsingModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        //now save the goalsecondfn record in here...
        saveGoalSecondFn($fetchedGoalSecond->id, $fnId, $userObject->id);
        $fetchedGoalSecondFn = getGoalSecondFnUsingModifiedyByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        //now save the goalfirstg1 value...
        saveGoalSecondG1($fetchedGoalSecondFn->id, $g1, $userObject->id);
        //fetch the value using the above parameters you have used to save the values to the database...
        $fetchedGoalSecondG1 = getGoalSecondG1UsingAndModifiedBy($fetchedGoalSecondFn->id, $g1, $userObject->id);


        for($i = 1; $i <= $numItemsG1; $i++){
          $g1ObjTextBoxId = "txtg1obj" . $i;
          $g1ObjTextBoxValue = mysql_real_escape_string($_POST["$g1ObjTextBoxId"]);
          //now save the values to the database...
          saveGoalSecondG1Obj($fetchedGoalSecondG1->id, $g1ObjTextBoxValue, $userObject->id);
        }//end for loop i

        //now do the same thing for G2
        saveGoalSecondG2($fetchedGoalSecondFn->id, $g2, $userObject->id);
        //fetch the value using the above parameters you have used to save the values to the database...
        $fetchedGoalSecondG2 = getGoalSecondG2UsingAndModifiedBy($fetchedGoalSecondFn->id, $g2, $userObject->id);

        for($j = 1; $j <= $numItemsG2; $j++){
          $g2ObjTextBoxId = "txtg2obj" . $j;
          $g2ObjTextBoxValue = mysql_real_escape_string($_POST["$g2ObjTextBoxId"]);
          //now save the values to the database...
          saveGoalSecondG2Obj($fetchedGoalSecondG2->id, $g2ObjTextBoxValue, $userObject->id);
        }//end for loop i

        //now do the same thing for G3
        saveGoalSecondG3($fetchedGoalSecondFn->id, $g3, $userObject->id);
        //fetch the value using the above parameters you have used to save the values to the database...
        $fetchedGoalSecondG3 = getGoalSecondG3UsingAndModifiedBy($fetchedGoalSecondFn->id, $g3, $userObject->id);

        for($k = 1; $k <= $numItemsG3; $k++){
          $g3ObjTextBoxId = "txtg3obj" . $k;
          $g3ObjTextBoxValue = mysql_real_escape_string($_POST["$g3ObjTextBoxId"]);
          //now save the values to the database...
          saveGoalSecondG3Obj($fetchedGoalSecondG3->id, $g3ObjTextBoxValue, $userObject->id);
        }//end for loop i
    }else if($userObj->user_level == '02'){
        //fetch the value just saved using the thId
        //$fetchedGoalSecond = getGoalSecondUsingModifiedBy($_SESSION['LOGGED_USER_ID']);
        $userSubDistrictObj = getSubDistrictInfoForUser($_SESSION['LOGGED_USER_ID']);
        $fetchedGoalSecond = getGoalSecondUsingModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        //now save the goalsecondfn record in here...
        saveGoalSecondFn($fetchedGoalSecond->id, $fnId, $_SESSION['LOGGED_USER_ID']);
        $fetchedGoalSecondFn = getGoalSecondFnUsingModifiedyBy($_SESSION['LOGGED_USER_ID']);
        //now save the goalfirstg1 value...
        saveGoalSecondG1($fetchedGoalSecondFn->id, $g1, $_SESSION['LOGGED_USER_ID']);
        //fetch the value using the above parameters you have used to save the values to the database...
        $fetchedGoalSecondG1 = getGoalSecondG1UsingAndModifiedBy($fetchedGoalSecondFn->id, $g1, $_SESSION['LOGGED_USER_ID']);


        for($i = 1; $i <= $numItemsG1; $i++){
            $g1ObjTextBoxId = "txtg1obj" . $i;
            $g1ObjTextBoxValue = mysql_real_escape_string($_POST["$g1ObjTextBoxId"]);
            //now save the values to the database...
            saveGoalSecondG1Obj($fetchedGoalSecondG1->id, $g1ObjTextBoxValue, $_SESSION['LOGGED_USER_ID']);
        }//end for loop i

        //now do the same thing for G2
        saveGoalSecondG2($fetchedGoalSecondFn->id, $g2, $_SESSION['LOGGED_USER_ID']);
        //fetch the value using the above parameters you have used to save the values to the database...
        $fetchedGoalSecondG2 = getGoalSecondG2UsingAndModifiedBy($fetchedGoalSecondFn->id, $g2, $_SESSION['LOGGED_USER_ID']);

        for($j = 1; $j <= $numItemsG2; $j++){
            $g2ObjTextBoxId = "txtg2obj" . $j;
            $g2ObjTextBoxValue = mysql_real_escape_string($_POST["$g2ObjTextBoxId"]);
            //now save the values to the database...
            saveGoalSecondG2Obj($fetchedGoalSecondG2->id, $g2ObjTextBoxValue, $_SESSION['LOGGED_USER_ID']);
        }//end for loop i

        //now do the same thing for G3
        saveGoalSecondG3($fetchedGoalSecondFn->id, $g3, $_SESSION['LOGGED_USER_ID']);
        //fetch the value using the above parameters you have used to save the values to the database...
        $fetchedGoalSecondG3 = getGoalSecondG3UsingAndModifiedBy($fetchedGoalSecondFn->id, $g3, $_SESSION['LOGGED_USER_ID']);

        for($k = 1; $k <= $numItemsG3; $k++){
            $g3ObjTextBoxId = "txtg3obj" . $k;
            $g3ObjTextBoxValue = mysql_real_escape_string($_POST["$g3ObjTextBoxId"]);
            //now save the values to the database...
            saveGoalSecondG3Obj($fetchedGoalSecondG3->id, $g3ObjTextBoxValue, $_SESSION['LOGGED_USER_ID']);
        }//end for loop i
  }
?>
