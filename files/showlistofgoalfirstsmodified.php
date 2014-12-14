<?php
    @session_start();
?>
<h1>Goal First List</h1>
<?php
    require_once 'th.php';
    require_once 'thaction.php';
    require_once 'goalfirst.php';
    require_once 'goalfirstth.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    //require_once 'userzone.php';
    //$goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
    //$goalFirstThList = getAllGoalFirstThsModifiedBy($_SESSION['LOGGED_USER_ID']);
    //this will have to be like all goalFirsts then filter out the ths in the goal first list
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    /*if($userObj->user_level == 'Zone Level'){
        $userZoneObj = getZoneInfoForUser($userObj->id);
        $goalFirstThList = getAllGoalFirstThsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
    }*/
    if($userObj->user_level == '02'){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $goalFirstThList = getAllGoalFirstThsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
        $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        if(!empty($userObj)){
          $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
          $goalFirstThList = getAllGoalFirstThsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }
    }

    if(!empty($goalFirstThList) && mysql_num_rows($goalFirstThList)){
        ?>
        <table border="1" width="100%" rules="all">
            <tr style="background: #CCC">
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
                                <td><?php echo stripslashes($thObj->th_name);?></td>
                                <td align="middle">
                                    <a href="#.php" id="<?php echo $thObj->id;?>" class="openActionFormClass"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="<?php echo $goalFirstThRow->th_id;?>" class="closeActionFormClass"><img src="images/close.png" border="0" align="absmiddle"/></a>
                                </td>
                                <td align="middle">
                                    <a href="#.php" id="<?php echo $goalFirstThRow->th_id;?>" class="openGoalFirstDetailForEditClass"><img src="images/edit.png" border="0" align="absmiddle"/></a>
                                </td>
                                <td align="middle">
                                    <a href="#.php" id="<?php echo $goalFirstThRow->id;?>" class="deleteGoalFirstDetailClass"><img src="images/delete.png" border="0" align="absmiddle"/></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
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
    }else{
    ?>
      <div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
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
