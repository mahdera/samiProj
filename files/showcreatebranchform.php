<?php
    require_once 'zone.php';
    $zoneList = getAllZones();
?>
<div>
    <table border="0" width="100%">
        <tr>
            <td>Zone:</td>
            <td>
                <select name="slctzone" id="slctzone" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($zoneRow = mysql_fetch_object($zoneList)){
                          ?>
                            <option value="<?php echo $zoneRow->id;?>"><?php echo $zoneRow->zone_name;?></option>
                          <?php
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Branch Name:</td>
            <td>
                <input type="text" name="txtbranchname" id="txtbranchname" size="70"/>
            </td>
        </tr>
        <tr>
            <td>Description:</td>
            <td>
                <textarea name="textareadescription" id="textareadescription" rows="3" style="width:100%"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Create" id="btnsave"/>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsave').click(function(){
            var zoneId = $('#slctzone').val();
            var branchName = $('#txtbranchname').val();
            var description = $('#textareadescription').val();

            if(zoneId != "" && branchName != ""){
                var dataString = "zoneId="+zoneId+"&branchName="+branchName+"&description="+description;
                $.ajax({
                    url: 'files/createbranch.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#branchManagementDiv').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>
