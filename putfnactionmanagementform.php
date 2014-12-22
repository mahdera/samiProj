<h1><a href="#.php" id="kevinHeartLink">Fn Action</a></h1>
<div id="fnActionShowDiv">
<?php
    //first grab all fn record from the database...
    require_once 'files/fn.php';
    require_once 'files/fnaction.php';
    require_once 'files/goalsecond.php';
    require_once 'files/goalsecondfn.php';
    require_once 'files/usersubdistrict.php';
    require_once 'files/user.php';

    $goalSecondFnList = null;

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '02'){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      $goalSecondFnList = getAllGoalSecondFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $goalSecondFnList = getAllGoalSecondFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
      }
    }

    //$goalSecondFnList = getAllGoalSecondFnsModifiedBy($_SESSION['LOGGED_USER_ID']);
    if(!empty($goalSecondFnList) && mysql_num_rows($goalSecondFnList)){
?>
<table border="1" width="100%" rules="all">
    <tr style="background: #ccc">
        <td>Fn</td>
        <td></td>
    </tr>
    <?php
        $ctr=1;
        while($goalSecondFnRow = mysql_fetch_object($goalSecondFnList)){
            $fnObj = getFn($goalSecondFnRow->fn_id);
            $countVal = 0;
            $divId = "actionDiv" . $fnObj->id;
            $countVal = doesThisFnAlreadyActionFilledForIt($fnObj->id);
            if(true){
                ?>
                    <tr>
                        <td width="20%"><?php echo stripslashes($fnObj->fn_name);?></td>
                        <td align="right">
                          <?php
                            if($countVal == 0){
                              ?>
                                <a href="#.php" id="<?php echo $fnObj->id;?>" class="openActionFormClass">Add</a>
                              <?php
                            }else{
                              ?>
                                <a href="#.php" id="<?php echo $fnObj->id;?>" class="editFnActionLink">Edit</a>
                              <?php
                            }
                          ?>
                          |
                          <a href="#.php" id="<?php echo $fnObj->id;?>" class="deleteFnActionLink">Delete</a>
                          |
                          <a href="#.php" id="<?php echo $fnObj->id;?>" class="closeActionFormClass">Close</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="<?php echo $divId;?>"></div>
                        </td>
                    </tr>
                <?php
            }
        }//end while loop
    ?>
</table>
<?php
}else{
  ?>
    <div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
  <?php
}
?>
</div>
