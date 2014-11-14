<?php
    session_start();
?>
<h1>Goal First List</h1>
<?php
    require_once 'th.php';
    require_once 'thaction.php';
    require_once 'goalfirst.php';
    require_once 'goalfirstth.php';
    require_once 'user.php';
    require_once 'userbranch.php';
    require_once 'userzone.php';
    //$goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
    $goalFirstThList = null;//getAllGoalFirstThsModifiedBy($_SESSION['LOGGED_USER_ID']);
    //this will have to be like all goalFirsts then filter out the ths in the goal first list
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == 'Zone Level'){
        $userZoneObj = getZoneInfoForUser($userObj->id);
        $goalFirstThList = getAllGoalFirstThsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
    }else if($userObj->user_level == 'Branch Level'){
        $userBranchObj = getBranchInfoForUser($userObj->id);
        $goalFirstThList = getAllGoalFirstThsModifiedByUsingUserLevel('Branch Level', $userBranchObj->branch_id);
    }

    if(!empty($goalFirstThList)){
        ?>
        <table border="0" width="100%">
            <tr style="background: #CCC">
                <td width="10%">Ser.No</td>
                <td width="20%">Th</td>
                <td>Action</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php
                $ctr=1;
                    while($goalFirstThRow = mysql_fetch_object($goalFirstThList)){
                        $thObj = getTh($goalFirstThRow->th_id);
                        $countVal = 0;
                        $divId = "actionDiv" . $goalFirstThRow->th_id;
                        //$countVal = doesThisThAlreadyActionFilledForIt($thObj->id);
                        if(true){
                            ?>
                            <tr>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo $thObj->th_name;?></td>
                                <td>
                                    [<a href="#.php" id="<?php echo $thObj->id;?>" class="openActionFormClass">Show Goal First Detail</a> | <a href="#.php" id="<?php echo $goalFirstThRow->th_id;?>" class="closeActionFormClass">Close Goal First Detail</a>]
                                </td>
                                <td>
                                    <a href="#.php" id="<?php echo $goalFirstThRow->th_id;?>" class="openGoalFirstDetailForEditClass">Edit</a>
                                </td>
                                <td>
                                    <a href="#.php" id="<?php echo $goalFirstThRow->id;?>" class="deleteGoalFirstDetailClass">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div id="<?php echo $divId;?>"></div>
                                </td>
                            </tr>
                            <?php
                            $ctr++;
                        }//end inner...if condition
                    }//end while loop construct
                ?>
        </table>
        <?php
    }
?>
<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.openActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            //now create the div element using the id you got in here...
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showgoalfirstdetailhere.php?thId='+idVal);
        });

        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });

        $('.openGoalFirstDetailForEditClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).load('files/showgoalfirstdetailhereforedit.php?thId='+idVal);
        });

        $('.deleteGoalFirstDetailClass').click(function(){
          if(window.confirm('Are you sure you want to delete this goal first record?')){
            var idVal = $(this).attr('id');
            var divId = "subDetailDiv";
            var dataString = "goalFirstThId=" + idVal;
            $.ajax({
                url: 'files/deletegoalfirst.php',
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
