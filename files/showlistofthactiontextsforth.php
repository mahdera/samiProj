<?php
    session_start();
    $thId = $_GET['thId'];
    require_once 'thaction.php';
    require_once 'usersubdistrict.php';
    require_once 'user.php';
    //I have only a thId and hence I need to grab the th action text associated with this id.

    //$userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $thActionList = null;
    $thActionList = getAllThActionForThisTh($thId);
    //now get all thActions for
    //$thActionList = getAllThActionsForThisThModifiedBy($thId, $_SESSION['LOGGED_USER_ID']);
    /*if($userObj->user_level == '02'){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      //$fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
      $thActionList = getAllThActionsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }*/
?>
<table border="0" width="100%">
    <tr style="background:#ccc">
      <td width="10%">Ser.No</td>
      <td>Action Text</td>
    </tr>
    <?php
      $ctr=1;
      if(isset($thActionList) && mysql_num_rows($thActionList)){
          while($thActionRow = mysql_fetch_object($thActionList)){
            ?>
              <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $thActionRow->action_text;?></td>
              </tr>
            <?php
          }//end while loop
      }else{
          ?>
          <tr>
              <td colspan="2">
                  <div class="notify notify-yellow"><span class="symbol icon-info"></span> No Action Texts Found!</div>
              </td>
          </tr>
          <?php
      }
    ?>
</table>
