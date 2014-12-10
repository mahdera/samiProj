<?php
    session_start();
    $thId = $_POST['thId'];
    require_once 'risk.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $thUsed = null;

    if($userObj->user_level == '02'){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $thUsed = hasThisThBeenUsedForRiskByThisUserUsingUserLevel($thId, '02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        if($userObject != null){
          $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);      
          $thUsed = hasThisThBeenUsedForRiskByThisUserUsingUserLevel($thId, '02', $userSubDistrictObj->sub_district_id);
        }
    }


    if($thUsed){
      ?>
          <div class="notify notify-red"><span class="symbol icon-error"></span> This Th has already been used before. Please try selecting another Th value from the select box!</div>
      <?php
    }
?>
