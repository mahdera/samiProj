<?php
session_start();
$id = 0;
?>
<h2>Form 4 Records</h2>
<?php
require_once 'form4.php';
require_once 'user.php';
require_once 'usersubdistrict.php';

$form4List = null;
$userObj = getUser($_SESSION['LOGGED_USER_ID']);
if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $form4List = getLatestForm4ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $form4List = getLatestForm4ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
    }
}

if(!empty($form4List) && mysql_num_rows($form4List)){
    $form4Obj = mysql_fetch_object($form4List);
    $id = $form4Obj->id;
    //define the control names in here...
    $q41TextAreaControlName = "q4_1" . $id;
    $buttonId = "btnupdateform4" . $id;
    ?>
    <form>
        <table border="0" width="100%" style="padding: 5px">
            <tr>
                <td>Q4.1:</td>
                <td>
                    <textarea name="<?php echo $q41TextAreaControlName;?>" id="<?php echo $q41TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form4Obj->q4_1);?></textarea>
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
    echo 'form 4 is empty!';
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform4" + id;

        $('#'+buttonId).click(function(){
            var divId = "form4EditDiv" + id;
            var q41TextAreaControlName = "q4_1" + id;
            //now get the values...
            var q41Value = $('#'+q41TextAreaControlName).val();
            var dataString = "id="+id+"&q41Value="+q41Value;
            $.ajax({
                url: 'files/updateform4.php',
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
