<?php
    session_start();
    $fnId = $_POST['fnId'];
    require_once 'goalsecondfn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $fnUsed = 0;
    //$fnUsed = hasThisFnBeenUsedForGoalSecondByThisUser($fnId, $_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '02'){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $fnUsed = hasThisFnBeenUsedForGoalSecondByUsingUserLevel($fnId, '02', $userSubDistrictObj->sub_district_id);
    }

    if($fnUsed){
      ?>
          <div class="notify notify-red"><span class="symbol icon-error"></span> This Fn has already been used before. Please try selecting another Fn value from the select box!</div>
      <?php
    }
?>
