<?php
session_start();
$id = 0;
?>
<h2>Form 3 Records</h2>
<?php
require_once 'form3.php';
require_once 'user.php';
require_once 'usersubdistrict.php';

$form3List = null;
$userObj = getUser($_SESSION['LOGGED_USER_ID']);
if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $form3List = getLatestForm3ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $form3List = getLatestForm3ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
    }
}

if(!empty($form3List) && mysql_num_rows($form3List)){
    $form3Obj = mysql_fetch_object($form3List);
    $id = $form3Obj->id;
    //define the control names in here...
    $q31TextAreaControlName = "q3_1" . $id;
    $buttonId = "btnupdateform3" . $id;
    ?>
    <form>
        <table border="0" width="100%" style="padding: 5px">
            <tr>
                <td>Q3.1:</td>
                <td>
                    <textarea name="<?php echo $q31TextAreaControlName;?>" id="<?php echo $q31TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form3Obj->q3_1);?></textarea>
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
    echo 'form 3 is empty!';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform3" + id;

        $('#'+buttonId).click(function(){
            var divId = "form3EditDiv" + id;
            var q31TextAreaControlName = "q3_1" + id;
            //now get the values...
            var q31Value = $('#'+q31TextAreaControlName).val();
            var dataString = "id="+id+"&q31Value="+q31Value;
            $.ajax({
                url: 'files/updateform3.php',
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
