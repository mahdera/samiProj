<?php
    session_start();
    require_once 'user.php';
    require_once 'userdistrict.php';
    require_once 'usersubdistrict.php';

    $adminUser = getUserUsingUserId($_SESSION['USER_ID']);
    //get the values...
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $memberType = $_POST['memberType'];
    $userStatus = $_POST['userStatus'];
    $userLevel = $_POST['userLevel'];
    $userRole = $_POST['userRole'];
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
