<?php
    require_once 'files/fnaction.php';
    require_once 'files/fn.php';
    require_once 'files/user.php';
    require_once 'files/usersubdistrict.php';
    @session_start();
    $fnActionList = null;

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '02'){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      //$fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
      $fnActionList = getAllFnActionsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $fnActionList = getAllFnActionsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
      }
    }
    if(/*!empty($fnActionList) && mysql_num_rows($fnActionList)*/false){
?>
<div id="fnActionDetailDiv">
<table border="1" width="100%" rules="all">
    <tr style="background: #ccc">
        <td>Fn</td>
        <td>Fn Action Text</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;
        while($fnActionRow = mysql_fetch_object($fnActionList)){
            $fnObj = getFn($fnActionRow->fn_id);
            ?>
            <tr>
                <td><?php echo stripslashes($fnObj->fn_name);?></td>
                <td><?php echo stripslashes($fnActionRow->action_text);?></td>
                <td align="right">
                    <?php
                        $editLinkId = $fnActionRow->id;
                        $editDivId = "editActionTextDiv" . $fnActionRow->id;
                        $deleteLinkId = $fnActionRow->id;
                    ?>
                    <a href="#.php" id="<?php echo $editLinkId;?>" class="editFnActionLinkId">Edit</a>
                    |
                    <a href="#.php" id="<?php echo $deleteLinkId;?>" class="deleteFnActionLinkId">Delete</a>
                    |
                    <a href="#.php" id="<?php echo $editLinkId;?>" class="closeFnActionLinkId">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div id="<?php echo $editDivId;?>"></div>
                </td>
            </tr>
            <?php
        }//end while loop
    ?>
</table>
</div>
<?php
}else{
    require_once 'files/showlistofgoalsecondsmodifiedforedit_fnaction.php';
}
?>
<script type="text/javascript">
    $(document).ready(function(){

        $('.closeFnActionLinkId').click(function(){
            var id = $(this).attr('id');
            var editDivId = "editActionTextDiv" + id;
            $('#'+editDivId).html('');
        });

        $('.editFnActionLinkId').click(function(){
            var id = $(this).attr('id');
            var editDivId = "editActionTextDiv" + id;
            //alert(editDivId);
            $('#'+editDivId).load('files/showeditfnactionform.php?id='+id, {noncache: new Date().getTime()});
        });

        $('.deleteFnActionLinkId').click(function(){
            if(window.confirm('Are you sure you want to delete this Fn Action Record?')){
              var id = $(this).attr('id');
              $('#fnActionDetailDiv').load('files/deletefnactionform.php?fnActionId='+id, {noncache: new Date().getTime()});
            }
        });

    });//end document.ready function
</script>
