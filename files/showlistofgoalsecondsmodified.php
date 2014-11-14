<?php
    session_start();
?>
<h2>Goal Second List</h2>
<?php
    //first grab all fn record from the database...
    require_once 'fn.php';
    require_once 'fnaction.php';
    require_once 'goalsecond.php';
    require_once 'goalsecondfn.php';
    require_once 'user.php';
    require_once 'userbranch.php';
    require_once 'userzone.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $goalSecondFnList = null;
    if($userObj->user_level == 'Zone Level'){
        $userZoneObj = getZoneInfoForUser($userObj->id);
        $goalSecondFnList = getAllGoalSecondFnsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
    }else if($userObj->user_level == 'Branch Level'){
        $userBranchObj = getBranchInfoForUser($userObj->id);
        $goalSecondFnList = getAllGoalSecondFnsModifiedByUsingUserLevel('Branch Level', $userBranchObj->branch_id);
    }

    //$goalSecondFnList = getAllGoalSecondFnsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Fn</td>
        <td>Action</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php
        $ctr=1;
        while($goalSecondFnRow = mysql_fetch_object($goalSecondFnList)){
            $fnObj = getFn($goalSecondFnRow->fn_id);
            $divExt = $goalSecondFnRow->modified_by ."_". $fnObj->id;
            $countVal = 0;
            $divId = "actionDiv" . $divExt;
            //$countVal = doesThisFnAlreadyActionFilledForIt($fnObj->id);
            if(true){
                ?>
                    <tr>
                        <td width="10%"><?php echo $ctr++;?></td>
                        <td width="20%"><?php echo $fnObj->fn_name;?></td>
                        <td>
                            <a href="#.php" id="<?php echo $divExt;?>" class="openActionFormClass">Show Goal Second Detail</a> | <a href="#.php" id="<?php echo $fnObj->id;?>" class="closeActionFormClass">Close Goal Second Detail</a>
                        </td>
                        <td>
                            <a href="#.php" id="<?php echo $divExt;?>" class="editGoalSecondLink">Edit</a>
                        </td>
                        <td>
                            <a href="#.php" id="<?php echo $goalSecondFnRow->id;?>" class="deleteGoalSecondLink">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div id="<?php echo $divId;?>"></div>
                        </td>
                    </tr>
                <?php
            }
        }//end while loop
    ?>
</table>
<script type="text/javascript">
    $(document).ready(function(){

        $('.openActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            var splitedResult = idVal.split('_');
            //now create the div element using the id you got in here...
            var fnId = splitedResult[2];

            $('#' + divId).load('files/showgoalseconddetailhere.php?fn_id='+fnId);
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
            if(window.confirm('Are you sure you want to delete this goal second record?')){
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
