<h1>Fn Action</h1>
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
        <td>Action</td>
        <td>View/Edit/Delete</td>
    </tr>
    <?php
        $ctr=1;
        while($goalSecondFnRow = mysql_fetch_object($goalSecondFnList)){
            $fnObj = getFn($goalSecondFnRow->fn_id);
            $countVal = 0;
            $divId = "actionDiv" . $fnObj->id;
            //$countVal = doesThisFnAlreadyActionFilledForIt($fnObj->id);
            if(true){
                ?>
                    <tr>
                        <td width="20%"><?php echo stripslashes($fnObj->fn_name);?></td>
                        <td align="middle">
                            <a href="#.php" id="<?php echo $fnObj->id;?>" class="openActionFormClass"><img src="images/open.png" align="absmiddle" border="0"/></a> | <a href="#.php" id="<?php echo $fnObj->id;?>" class="closeActionFormClass"><img src="images/close.png" border="0" align="absmiddle"/></a>
                        </td>
                        <td align="middle">
                          <!--<a href="#.php" id="<?php //echo $fnObj->id;?>" class="viewFnActionLink">View</a> | --><a href="#.php" id="<?php echo $fnObj->id;?>" class="editFnActionLink"><img src="images/edit.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="<?php echo $fnObj->id;?>" class="deleteFnActionLink"><img src="images/delete.png" border="0" align="absmiddle"/></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
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
            //now create the div element using the id you got in here...
            var divId = "actionDiv" + idVal;

            $('#' + divId).load('files/showputfnactionform.php?fn_id='+idVal);
        });

        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });

        $('.viewFnActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showlistoffnactiontextsforfn.php?fnId='+idVal);
        });

        $('.editFnActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            //$('#' + divId).load('files/showlistoffnactiontextsforfnforedit.php?fnId='+idVal);
            $('#' + divId).load('files/showeditfieldsofthisfnaction.php?fnId='+idVal);
        });

        $('.deleteFnActionLink').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            if(window.confirm('Are you sure you want to delete this record?')){
                $('#' + divId).load('files/deletefnactionforthisfn.php?fnId='+idVal);
            }
            //$('#' + divId).load('files/showlistoffnactiontextsforfnfordelete.php?fnId='+idVal);
        });

    });//end document.ready function
</script>
