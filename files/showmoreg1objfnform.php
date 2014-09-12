<?php
    require_once 'fn.php';
    $fnList = getAllFns();
    $numItems = $_POST['numItems'];
    //now define the control names in here...
    $objControlName = "txtg1obj" . ($numItems + 1);
    $fnSelectControlName = "slctg1fn" . ($numItems + 1);
    $trRowId = "trg1" . ($numItems + 1);
?>
<tr id="<?php echo $trRowId;?>">
    <td colspan="2">
        <table border="0" width="100%" style="background: lightyellow">
            <tr>
                <td>Obj:</td>
                <td>
                    <input type="text" id="<?php echo $objControlName;?>" name="<?php echo $objControlName;?>" class="g1Obj"/>
                </td>                        
            </tr>
            <tr>
                <td>Fn:</td>
                <td>
                    <select name="<?php echo $fnSelectControlName;?>" id="<?php echo $fnSelectControlName;?>" style="width: 100%">
                        <option value="" selected="selected">--Select--</option>
                        <?php
                            while($fnRow = mysql_fetch_object($fnList)){
                                ?>
                                    <option value="<?php echo $fnRow->fn_name;?>"><?php echo $fnRow->fn_name;?></option>
                                <?php
                            }//end while loop
                            ?>
                                    <!--<option value="other">other</option>-->                        
                    </select>
                </td>
            </tr>
        </table>
    </td>
</tr>