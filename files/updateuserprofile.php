<?php
    session_start();
    require_once 'user.php';
    require_once 'userdistrict.php';
    require_once 'usersubdistrict.php';

    $adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $id = $_POST['id'];
    @$firstName = mysql_real_escape_string($_POST['firstName']);
    @$lastName = mysql_real_escape_string($_POST['lastName']);
    @$email = mysql_real_escape_string($_POST['email']);
    @$phoneNumber = mysql_real_escape_string($_POST['phoneNumber']);
    @$memberType = mysql_real_escape_string($_POST['memberType']);
    @$userStatus = mysql_real_escape_string($_POST['userStatus']);
    @$userLevel = mysql_real_escape_string($_POST['userLevel']);
    @$userRole = mysql_real_escape_string($_POST['userRole']);
    $eitherZoneIdOrBranchId = $_POST['eitherZoneIdOrBranchId'];
    //now I can save this info to the database...
    if($userLevel == 'Sub District Level'){
      updateUser($id, $firstName, $lastName, $email, $phoneNumber, $memberType, $userStatus, $userLevel, $userRole, $adminUser->id);
      //now remove any record for this user from the user_zone table
      deleteUserDistrictForThisUser($id);
      //check if a user_branch record already exists...
      $userBranchExists = false;
      $userBranchExists = doesThisUserHasExistingUserSubDistrictRecord($id);
      if($userBranchExists){
          updateUserSubDistrictForUser($id, $eitherZoneIdOrBranchId);
      }else{
          saveUserSubDistrict($eitherZoneIdOrBranchId, $id);
      }
    }else if($userLevel == 'District Level'){
      updateUser($id, $firstName, $lastName, $email, $phoneNumber, $memberType, $userStatus, $userLevel, $userRole, $adminUser->id);
      deleteUserSubDistrictForThisUser($id);
      //check if a user_zone record already exists...
      $userZoneExists = false;
      $userZoneExists = doesThisUserHasExistingUserDistrictRecord($id);
      if($userZoneExists){
          updateUserDistrictForUser($id, $eitherZoneIdOrBranchId);
      }else{
          saveUserDistrict($eitherZoneIdOrBranchId, $id);
      }
    }

    require_once 'showusermanagementlist.php';
?>
