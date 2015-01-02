<?php
session_start();
$id = 0;
?>
<h2>Form 8 Records</h2>
<?php
require_once 'form8.php';
require_once 'user.php';
require_once 'usersubdistrict.php';

$form8List = null;
$userObj = getUser($_SESSION['LOGGED_USER_ID']);
if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $form8List = getLatestForm8ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $form8List = getLatestForm8ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
    }
}

if(!empty($form8List) && mysql_num_rows($form8List)){
    $form8Obj = mysql_fetch_object($form8List);
    $id = $form8Obj->id;
    //define the control names in here...
    $q81TextAreaControlName = "q8_1" . $id;
    $buttonId = "btnupdateform8" . $id;
    ?>
    <form>
        <table border="0" width="100%" style="padding: 5px">
            <tr>
                <td>Q8.1:</td>
                <td>
                    <textarea name="<?php echo $q81TextAreaControlName;?>" id="<?php echo $q81TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form8Obj->q8_1);?></textarea>
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
    echo 'form 8 is empty!';
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform8" + id;

        $('#'+buttonId).click(function(){
            var divId = "form8EditDiv" + id;
            var q81TextAreaControlName = "q8_1" + id;
            //now get the values...
            var q81Value = $('#'+q81TextAreaControlName).val();
            var dataString = "id="+id+"&q81Value="+q81Value;
            $.ajax({
                url: 'files/updateform8.php',
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
