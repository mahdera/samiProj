<?php
    require_once 'subdistrict.php';
    require_once 'district.php';

    $branchId = $_GET['branchId'];
    $branchObj = getSubDistrict($branchId);
    //define the control names in here...
    $zoneControl = "slctzone" . $branchId;
    $branchNameControl = "txtbranchname" . $branchId;
    $descriptionControl = "textareadescription" . $branchId;
    $buttonId = "btnupdate" . $branchId;
    $zoneList = getAllDistricts();
?>
<div>
    <table border="0" width="100%">
        <tr>
            <td>Zone:</td>
            <td>
                <select name="<?php echo $zoneControl;?>" id="<?php echo $zoneControl;?>" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($zoneRow = mysql_fetch_object($zoneList)){
                          if($branchObj->district_id == $zoneRow->id){
                          ?>
                            <option value="<?php echo $zoneRow->id;?>" selected="selected"><?php echo $zoneRow->display_name;?></option>
                          <?php
                          }else{
                          ?>
                            <option value="<?php echo $zoneRow->id;?>"><?php echo $zoneRow->display_name;?></option>
                          <?php
                          }
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Sub District Name:</td>
            <td>
                <input type="text" name="<?php echo $branchNameControl;?>" id="<?php echo $branchNameControl;?>" size="70" value="<?php echo $branchObj->display_name;?>"/>
            </td>
        </tr>
        <tr style="display:none;">
            <td>Description:</td>
            <td>
                <textarea name="<?php echo $descriptionControl;?>" id="<?php echo $descriptionControl;?>" rows="3" style="width:100%"><?php echo $branchObj->description;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var branchId = "<?php echo $branchId;?>";
        var buttonId = "btnupdate" + branchId;

        $('#'+buttonId).click(function(){
            var zoneControl = "slctzone" + branchId;
            var branchNameControl = "txtbranchname" + branchId;
            var descriptionControl = "textareadescription" + branchId;
            //now get the values...
            var zoneIdVal = $('#'+zoneControl).val();
            var branchNameVal = $('#'+branchNameControl).val();
            var descriptionVal = "---";//$('#'+descriptionControl).val();

            var divId = "branchEditDiv" + branchId;
            var dataString = "zoneId="+zoneIdVal+"&branchName="+branchNameVal+"&description="+
            descriptionVal+"&branchId="+branchId;
            $.ajax({
                url: 'files/updatebranch.php',
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
