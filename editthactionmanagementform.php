<h2>Edit Th Action</h2>
<?php
    error_reporting( 0 );
    require_once 'files/thaction.php';
    require_once 'files/th.php';
    require_once 'files/user.php';
    require_once 'files/usersubdistrict.php';

    $thActionList = null;

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '02'){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      //$fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
      $thActionList = getAllThActionsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }
    //$thActionList = getAllThActionsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<div id="thActionDetailDiv">
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Th</td>
        <td>Th Action Text</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;
        while($thActionRow = mysql_fetch_object($thActionList)){
            $thObj = getTh($thActionRow->th_id);
            ?>
            <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $thObj->th_name;?></td>
                <td><?php echo $thActionRow->action_text;?></td>
                <td>
                    <?php
                        $editLinkId = $thActionRow->id;
                        $editDivId = "editActionTextDiv" . $thActionRow->id;
                        $deleteLinkId = $thActionRow->id;
                    ?>
                    <a href="#.php" id="<?php echo $editLinkId;?>" class="editThActionLink">Edit</a>
                    |
                    <a href="#.php" id="<?php echo $deleteLinkId;?>" class="deleteThActionLink">Delete</a>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="<?php echo $editDivId;?>"></div>
                </td>
            </tr>
            <?php
        }//end while loop
    ?>
</table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.editThActionLink').click(function(){
            //alert('inside editThActionLink click');
            var id = $(this).attr('id');
            var editDivId = "editActionTextDiv" + id;
            $('#'+editDivId).load('files/showeditthactionform.php?thId='+id);
        });

        $('.deleteThActionLink').click(function(){
            if(window.confirm('Are you sure you want to delete this Th Action Record?')){
                var id = $(this).attr('id');
                $('#thActionDetailDiv').load('files/deletethactionform.php?thActionId='+id);
            }
        });
    });//end document.ready function
</script>
