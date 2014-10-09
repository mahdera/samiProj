<?php
    require_once 'fn.php';
    $fnList = getAllFns();
?>
<table border="1" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Fn Name</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;
        while($fnRow = mysql_fetch_object($fnList)){
            $divId = "fnEditDiv" . $fnRow->id;
            ?>
            <tr>
                <td><?php echo $ctr;?></td>
                <td><?php echo $fnRow->fn_name;?></td>
                <td>
                    [<a href="#.php" class="showFnDetailsLink" id="<?php echo $fnRow->id;?>">Show</a> | <a href="#.php" class="hideFnDetailsLink" id="<?php echo $fnRow->id;?>">Hide</a>]
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