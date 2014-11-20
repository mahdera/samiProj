<?php
    require_once 'district.php';
    $zoneId = $_GET['zoneId'];
    $zoneObj = getDistrict($zoneId);
    //define the control names in here
    $zoneNameControl = "txtzonename" . $zoneId;
    $descriptionControl = "textareadescription" . $zoneId;
    $buttonId = "btnsave" . $zoneId;
?>
<div>
    <form>
        <table border="0" width="100%">
            <tr>
                <td>District Name:</td>
                <td>
                    <input type="text" name="<?php echo $zoneNameControl;?>" id="<?php echo $zoneNameControl;?>" size="70" value="<?php echo $zoneObj->district_name;?>"/>
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="<?php echo $descriptionControl;?>" id="<?php echo $descriptionControl;?>" rows="3" style="width:100%"><?php echo $zoneObj->description;?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var zoneId = "<?php echo $zoneId;?>";
        var buttonId = "btnsave" + zoneId;

        $('#'+buttonId).click(function(){
            var zoneNameControl = "txtzonename" + zoneId;
            var descriptionControl = "textareadescription" + zoneId;
            //now get the values...
            var zoneNameVal = $('#'+zoneNameControl).val();
            var descriptionVal = $('#'+descriptionControl).val();
            var dataString = "zoneName="+zoneNameVal+"&description="+descriptionVal+"&zoneId="+zoneId;
            var divId = "zoneEditDiv" + zoneId;
            $.ajax({
                url: 'files/updatezone.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    $('#'+divId).html(response);
                },
                error:function(error){
                    alert(error);
                }
            });
        });
    });//end document.ready function
</script>
