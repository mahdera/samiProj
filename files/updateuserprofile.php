<?php
    session_start();
    require_once 'user.php';
    require_once 'userzone.php';
    require_once 'userbranch.php';

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
    if($userLevel == 'Branch Level'){
      updateUser($id, $firstName, $lastName, $email, $phoneNumber, $memberType, $userStatus, $userLevel, $userRole, $adminUser->id);
      //now remove any record for this user from the user_zone table
      deleteUserZoneForThisUser($id);
      //check if a user_branch record already exists...
      $userBranchExists = false;
      $userBranchExists = doesThisUserHasExistingUserBranchRecord($id);
      if($userBranchExists){
          updateUserBranchForUser($id, $eitherZoneIdOrBranchId);
      }else{
          saveUserBranch($eitherZoneIdOrBranchId, $id);
      }
    }else if($userLevel == 'Zone Level'){
      updateUser($id, $firstName, $lastName, $email, $phoneNumber, $memberType, $userStatus, $userLevel, $userRole, $adminUser->id);
      deleteUserBranchForThisUser($id);
      //check if a user_zone record already exists...
      $userZoneExists = false;
      $userZoneExists = doesThisUserHasExistingUserZoneRecord($id);
      if($userZoneExists){
          updateUserZoneForUser($id, $eitherZoneIdOrBranchId);
      }else{
          saveUserZone($eitherZoneIdOrBranchId, $id);
      }
    }

    require_once 'showusermanagementlist.php';
?>
