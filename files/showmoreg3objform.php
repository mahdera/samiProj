<?php
    $numItems = $_POST['numItems'];
    //now define the control names in here...
    $objControlName = "txtg3obj" . ($numItems + 1);
    $trRowId = "addMoreG3Obj" . ($numItems + 1);
?>
<tr id="<?php echo $trRowId;?>">
    <td colspan="2">
        <table border="0" width="100%" style="background: #fff">
            <tr>
                <td width="20%">Obj:</td>
                <td>
                    <input type="text" id="<?php echo $objControlName;?>" name="<?php echo $objControlName;?>" class="g3Obj" size="70"/>
                </td>
            </tr>
        </table>
    </td>
</tr>
