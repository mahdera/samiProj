<?php
session_start();
$id = 0;
?>
<h2>Form 9 Records</h2>
<?php
require_once 'form9.php';
require_once 'user.php';
require_once 'usersubdistrict.php';

$form9List = null;
$userObj = getUser($_SESSION['LOGGED_USER_ID']);
if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $form9List = getLatestForm9ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $form9List = getLatestForm9ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
    }
}

if(!empty($form9List) && mysql_num_rows($form9List)){
    $form9Obj = mysql_fetch_object($form9List);
    $id = $form9Obj->id;
    //define the control names in here...
    $q91TextAreaControlName = "q9_1" . $id;
    $buttonId = "btnupdateform9" . $id;
    ?>
    <form>
        <table border="0" width="100%" style="padding: 5px">
            <tr>
                <td>Q9.1:</td>
                <td>
                    <textarea name="<?php echo $q91TextAreaControlName;?>" id="<?php echo $q91TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form9Obj->q9_1);?></textarea>
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
    echo 'form 9 is empty!';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform9" + id;

        $('#'+buttonId).click(function(){
            var divId = "form9EditDiv" + id;
            var q91TextAreaControlName = "q9_1" + id;
            //now get the values...
            var q91Value = $('#'+q91TextAreaControlName).val();
            var dataString = "id="+id+"&q91Value="+q91Value;
            $.ajax({
                url: 'files/updateform9.php',
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
