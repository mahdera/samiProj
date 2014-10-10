<h2>Fn Action</h2>
<?php
    //first grab all fn record from the database...
    require_once 'files/fn.php';
    require_once 'files/fnaction.php';
    $fn_list = getAllFns();
?>
<table border="1" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Fn</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;        
        while($fn_row = mysql_fetch_object($fn_list)){
            $countVal = 0;
            $divId = "actionDiv" . $fn_row->id;
            $countVal = doesThisFnAlreadyActionFilledForIt($fn_row->id);
            if(!$countVal){
            ?>
                <tr>
                    <td><?php echo $ctr++;?></td>
                    <td><?php echo $fn_row->fn_name;?></td>
                    <td>
                        <a href="#.php" id="<?php echo $fn_row->id;?>" class="openActionFormClass">Show Add Action Form</a> | <a href="#.php" id="<?php echo $fn_row->id;?>" class="closeActionFormClass">Close Add Action Form</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="<?php echo $divId;?>"></div>
                    </td>
                </tr>
            <?php
            }//end if condition
        }//end while loop
    ?>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('.openActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            //now create the div element using the id you got in here...
            var divId = "actionDiv" + idVal;
            
            $('#' + divId).load('files/showputfnactionform.php?fn_id='+idVal);
        });
        
        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });
        
    });//end document.ready function
</script>


