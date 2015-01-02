<?php
session_start();
$id = 0;
?>
<h2>Form 7 Records</h2>
<?php
require_once 'form7.php';
require_once 'user.php';
require_once 'usersubdistrict.php';

$form7List = null;
$userObj = getUser($_SESSION['LOGGED_USER_ID']);
if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $form7List = getLatestForm7ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $form7List = getLatestForm7ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
    }
}

if(!empty($form7List) && mysql_num_rows($form7List)){
    $form7Obj = mysql_fetch_object($form7List);
    $id = $form7Obj->id;
    //define the control names in here...
    $q71TextAreaControlName = "q7_1" . $id;
    $buttonId = "btnupdateform7" . $id;
    ?>
    <form>
        <table border="0" width="100%" style="padding: 5px">
            <tr>
                <td>Q7.1:</td>
                <td>
                    <textarea name="<?php echo $q71TextAreaControlName;?>" id="<?php echo $q71TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form7Obj->q7_1);?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                </td>
            </tr>
        </table>
    </form>
    <?php
}else{
    echo 'form 7 is empty!';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform7" + id;

        $('#'+buttonId).click(function(){
            var divId = "form7EditDiv" + id;
            var q71TextAreaControlName = "q7_1" + id;
            //now get the values...
            var q71Value = $('#'+q71TextAreaControlName).val();
            var dataString = "id="+id+"&q71Value="+q71Value;
            $.ajax({
                url: 'files/updateform7.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    $('#innerDivToRefresh').load('showformmanagementgrid.php', {noncache: new Date().getTime()});
                },
                error:function(error){
                    alert(error);
                }
            });
        });
    });//end document.ready function
</script>
