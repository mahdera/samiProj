<?php
    @session_start();
?>
<h2>Goal Second List</h2>
<?php
    //first grab all fn record from the database...
    require_once 'fn.php';
    require_once 'fnaction.php';
    require_once 'goalsecond.php';
    require_once 'goalsecondfn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    //require_once 'userzone.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $goalSecondFnList = null;
    /*if($userObj->user_level == 'Zone Level'){
        $userZoneObj = getZoneInfoForUser($userObj->id);
        $goalSecondFnList = getAllGoalSecondFnsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
    }*/
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
            $divExt = $goalSecondFnRow->modified_by ."_". $fnObj->id;
            $countVal = 0;
            $divId = "actionDiv" . $fnObj->id;
            //$countVal = doesThisFnAlreadyActionFilledForIt($fnObj->id);
            if(true){
                ?>
                    <tr>
                        <td width="20%"><?php echo stripslashes($fnObj->fn_name);?></td>
                        <td align="right">
                            <a href="#.php" id="<?php echo $fnObj->id;?>" class="editGoalSecondLink">Edit</a>
                            |
                            <a href="#.php" id="<?php echo $goalSecondFnRow->id;?>" class="deleteGoalSecondLink">Delete</a>
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
<script type="text/javascript">
    $(document).ready(function(){

        $('.openActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showgoalseconddetailhere.php?fn_id='+idVal);
        });

        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });

        $('.editGoalSecondLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showgoalseconddetailhereforedit.php?fn_id='+idVal);
        });

        $('.deleteGoalSecondLink').click(function(){
            if(window.confirm('Are you sure you want to delete this record?')){
              var idVal = $(this).attr('id');
              var divId = "subDetailDiv";
              var dataString = "goalSecondFnId=" + idVal;
              $.ajax({
                  url: 'files/deletegoalsecond.php',
                  data: dataString,
                  type:'POST',
                  success:function(response){
                      $('#'+divId).html(response);
                  },
                  error:function(error){
                      alert(error);
                  }
              });
            }
        });

    });//end document.ready function
</script>
