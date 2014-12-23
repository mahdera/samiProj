<?php
session_start();
$id = 0;
?>
<h2>Form 5 Records</h2>
<?php
require_once 'form5.php';
require_once 'user.php';
require_once 'usersubdistrict.php';

$form5List = null;
$userObj = getUser($_SESSION['LOGGED_USER_ID']);
if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $form5List = getLatestForm5ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $form5List = getLatestForm5ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
    }
}

if(!empty($form5List) && mysql_num_rows($form5List)){
    $form5Obj = mysql_fetch_object($form5List);
    $id = $form5Obj->id;
    //define the control names in here...
    $q51TextAreaControlName = "q5_1" . $id;
    $buttonId = "btnupdateform5" . $id;
    ?>
    <form>
        <table border="0" width="100%" style="padding:5px">
            <tr>
                <td>Q4.1:</td>
                <td>
                    <textarea name="<?php echo $q51TextAreaControlName;?>" id="<?php echo $q51TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form5Obj->q5_1);?></textarea>
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
    echo 'form 5 is empty!';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform5" + id;

        $('#'+buttonId).click(function(){
            var divId = "form5EditDiv" + id;
            var q51TextAreaControlName = "q5_1" + id;
            //now get the values...
            var q51Value = $('#'+q51TextAreaControlName).val();
            var dataString = "id="+id+"&q51Value="+q51Value;
            $.ajax({
                url: 'files/updateform5.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    $('#innerDivToRefresh').load('showformmanagementgrid.php');
                },
                error:function(error){
                    alert(error);
                }
            });
        });
    });//end document.ready function
</script>
