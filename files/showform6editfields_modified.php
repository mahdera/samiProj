<?php
session_start();
$id = 0;
?>
<h2>Form 6 Records</h2>
<?php
require_once 'form6.php';
require_once 'user.php';
require_once 'usersubdistrict.php';

$form6List = null;
$userObj = getUser($_SESSION['LOGGED_USER_ID']);
if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $form6List = getLatestForm6ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $form6List = getLatestForm6ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
    }
}

if(!empty($form6List) && mysql_num_rows($form6List)){
    $form6Obj = mysql_fetch_object($form6List);
    $id = $form6Obj->id;
    //define the control names in here...
    $q61TextAreaControlName = "q6_1" . $id;
    $buttonId = "btnupdateform6" . $id;
    ?>
    <form>
        <table border="0" width="100%" style="padding: 5px">
            <tr>
                <td>Q6.1:</td>
                <td>
                    <textarea name="<?php echo $q61TextAreaControlName;?>" id="<?php echo $q61TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form6Obj->q6_1);?></textarea>
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
    echo 'form 6 is empty!';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform6" + id;

        $('#'+buttonId).click(function(){
            var divId = "form6EditDiv" + id;
            var q61TextAreaControlName = "q6_1" + id;
            //now get the values...
            var q61Value = $('#'+q61TextAreaControlName).val();
            var dataString = "id="+id+"&q61Value="+q61Value;
            $.ajax({
                url: 'files/updateform6.php',
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
