<?php
    require_once 'fn.php';
    $fnList = getAllFns();
    $numItems = $_POST['numItems'];
    //now define the control names in here...
    $objControlName = "txtg3obj" . ($numItems + 1);
    $fnSelectControlName = "slctg3fn" . ($numItems + 1);
    $trRowId = "trg3" . ($numItems + 1);
    $fnOtherDivId = "fnOtherG3ObjFn" . ($numItems + 1);
?>
<tr id="<?php echo $trRowId;?>">
    <td colspan="2">
        <table border="0" width="100%" style="background: lightyellow">
            <tr>
                <td>Obj:</td>
                <td>
                    <input type="text" id="<?php echo $objControlName;?>" name="<?php echo $objControlName;?>" class="g3Obj"/>
                </td>
            </tr>
            <tr>
                <td>Fn:</td>
                <td>
                    <select name="<?php echo $fnSelectControlName;?>" id="<?php echo $fnSelectControlName;?>" style="width: 100%" onchange="showOtherFnDataEntryForm(this.value, '<?php echo $fnOtherDivId;?>', <?php echo $numItems + 1;?>);">
                        <option value="" selected="selected">--Select--</option>
                        <?php
                            while($fnRow = mysql_fetch_object($fnList)){
                                ?>
                                    <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                <?php
                            }//end while loop
                            ?>
                            <option value="other">other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="<?php echo $fnOtherDivId;?>"><?php echo $fnOtherDivId;?></div>
                </td>
            </tr>
        </table>
    </td>
</tr>
<script type="text/javascript">
    function showOtherFnDataEntryForm(val, divId, uniqueVal){
        if(val === 'other'){
            //now insert the fn data entry form here...
            $('#'+divId).load('files/showotherfnentryformforuniquevalg3.php?uniqueVal='+uniqueVal);
        }
    }
</script>
