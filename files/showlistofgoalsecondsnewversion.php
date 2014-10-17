<?php
    session_start();
    require_once 'fn.php';
    require_once 'goalsecond.php';
    $goalSecondList = getAllGoalSecondsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="1" width="100%">
    <tr style="background: #ccc">        
        <td>Fn Name</td>
        <td>Action</td>        
    </tr>
    <?php
        $ctr=1;
        while($goalSecondRow = mysql_fetch_object($goalSecondList)){
            $divId = "fnEditDiv" . $goalSecondRow->id;
            $fnObj = getFn($goalSecondRow->fn_id);
            ?>
            <tr>                
                <td><?php echo $fnObj->fn_name;?></td>
                <td>
                    [<a href="#.php" class="showFnDetailsLink" id="<?php echo $goalSecondRow->id;?>">Show</a> | <a href="#.php" class="hideFnDetailsLink" id="<?php echo $fnRow->id;?>">Hide</a>]
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div id="<?php echo $divId;?>"></div>
                </td>
            </tr>
            <?php
            $ctr++;
        }//end while loop
    ?>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('.showFnDetailsLink').click(function(){
            var id = $(this).attr('id');
            var divId = "fnEditDiv" + id;
            $('#'+divId).load('files/showg1andobjsforthisfn.php?id='+id);
        });
        
        $('.hideFnDetailsLink').click(function(){
            var id = $(this).attr('id');
            var divId = "fnEditDiv" + id;
            $('#'+divId).html('');
        });
        
    });//end document.ready function
</script>