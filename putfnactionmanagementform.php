<h2>Fn Action</h2>
<?php
    //first grab all fn record from the database...
    require_once 'files/fn.php';
    require_once 'files/fnaction.php';
    $fn_list = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);//getAllFnsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Fn</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;        
        //while($fn_row = mysql_fetch_object($fn_list)){
        foreach($fn_list as $fnId){
            $fnObj = getFn($fnId);
            $countVal = 0;
            $divId = "actionDiv" . $fnId;
            $countVal = doesThisFnAlreadyActionFilledForIt($fnId);
            if(!$countVal){
            ?>
                <tr>
                    <td width="10%"><?php echo $ctr++;?></td>
                    <td width="20%"><?php echo $fnObj->fn_name;?></td>
                    <td>
                        <a href="#.php" id="<?php echo $fnId;?>" class="openActionFormClass">Show Add Action Form</a> | <a href="#.php" id="<?php echo $fnId;?>" class="closeActionFormClass">Close Add Action Form</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="<?php echo $divId;?>"></div>
                    </td>
                </tr>
            <?php
            }//end if condition
        }//end for each loop
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


