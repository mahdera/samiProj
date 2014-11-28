<?php
    session_start();
    $thId = $_POST['thId'];
    require_once 'goalfirstth.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $thUsed = 0;

    if($userObj->user_level == '02'){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $thUsed = hasThisThBeenUsedForGoalFirstByUsingUserLevel($thId, '02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
        $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $thUsed = hasThisThBeenUsedForGoalFirstByUsingUserLevel($thId, '02', $userSubDistrictObj->sub_district_id);
    }

    //$thUsed = hasThisThBeenUsedForGoalFirstByThisUser($thId, $_SESSION['LOGGED_USER_ID']);
    if($thUsed){
      ?>
          <div class="notify notify-red"><span class="symbol icon-error"></span> This Th has already been used before. Please try selecting another Th value from the select box!</div>
      <?php
    }
?>
