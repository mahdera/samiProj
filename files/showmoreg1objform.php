<?php    
    $numItems = $_POST['numItems'];
    //now define the control names in here...
    $objControlName = "txtg1obj" . ($numItems + 1);    
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
        </table>
    </td>
</tr>