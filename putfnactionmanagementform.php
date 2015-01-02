<?php
  @session_start();
?>
<h1><a href="#.php" id="kevinHeartLink">Fn Action</a></h1>
<div id="fnActionShowDiv">
<?php
    require_once 'importjsscripts.php';
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
      $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObject)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
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

            if($userObj->user_level == '02'){
                $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                $countVal = doesThisFnAlreadyActionFilledForItUsingDivision($fnObj->id, $goalSecondFnRow->goal_second_id, $userSubDistrictObj->sub_district_id);
            }else if($userObj->user_level == '01'){
                $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                if(!empty($userObject)){
                    $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
                    $countVal = doesThisFnAlreadyActionFilledForItUsingDivision($fnObj->id, $goalSecondFnRow->goal_second_id, $userSubDistrictObj->sub_district_id);
                }
            }

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
                          <?php
                            if($countVal != 0){
                          ?>
                          |
                          <a href="#.php" id="<?php echo $fnObj->id;?>" class="deleteFnActionLink">Delete</a>
                          <?php
                            }
                          ?>
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
<div id="subDetailDiv"></div>
<hr/>
<script type="text/javascript">
$(document).ready(function(){

  //$('#fnActionShowDiv').hide();

  $('#kevinHeartLink').click(function(){
    $('#fnActionShowDiv').hide('slow');
  });

  $('.openActionFormClass').click(function(){
    var idVal = $(this).attr('id');
    //now create the div element using the id you got in here...
    var divId = "actionDiv" + idVal;

    $('#' + divId).load('files/showputfnactionform.php?fn_id='+idVal, {noncache: new Date().getTime()});
  });

  $('.closeActionFormClass').click(function(){
    var idVal = $(this).attr('id');
    var divId = "actionDiv" + idVal;
    $('#' + divId).html('');
  });

  $('.viewFnActionLink').click(function(){
    var idVal = $(this).attr('id');
    var divId = "actionDiv" + idVal;
    $('#' + divId).load('files/showlistoffnactiontextsforfn.php?fnId='+idVal, {noncache: new Date().getTime()});
  });

  $('.editFnActionLink').click(function(){
    var idVal = $(this).attr('id');
    var divId = "actionDiv" + idVal;
    //$('#' + divId).load('files/showlistoffnactiontextsforfnforedit.php?fnId='+idVal);
    $('#' + divId).load('files/showeditfieldsofthisfnaction.php?fnId='+idVal, {noncache: new Date().getTime()});
  });

  $('.deleteFnActionLink').click(function(){
    var idVal = $(this).attr('id');
    var divId = "actionDiv" + idVal;

    if(window.confirm('Are you sure you want to delete this record?')){
      //$('#' + divId).load('files/deletefnactionforthisfn.php?fnId='+idVal);
      //$('#innerDivToRefresh').load('putfnactionmanagementform.php');
      var dataString = "fnId="+idVal;
      $.ajax({
        url: 'files/deletefnactionforthisfn.php',
        data: dataString,
        type:'GET',
        success:function(response){
          $('#innerDivToRefresh').load('putfnactionmanagementform.php', {noncache: new Date().getTime()});
          //$('#'+divId).html(response);
        },
        error:function(error){
          alert(error);
        }
      });
    }    
  });

});//end document.ready function
</script>
