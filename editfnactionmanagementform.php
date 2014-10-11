<h2>Edit Fn Action</h2>
<?php
    require_once 'files/fnaction.php';
    require_once 'files/fn.php';
    $fnActionList = getAllFnActionsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="1" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Fn</td>
        <td>Fn Action Text</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;
        while($fnActionRow = mysql_fetch_object($fnActionList)){
            $fnObj = getFn($fnActionRow->fn_id);            
            ?>
            <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $fnObj->fn_name;?></td>
                <td><?php echo $fnActionRow->action_text;?></td>
                <td>
                    <?php
                        $editLinkId = $fnActionRow->id;
                        $editDivId = "editActionTextDiv" . $fnActionRow->id
                    ?>
                    <a href="#.php" id="<?php echo $editLinkId;?>">Edit</a>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="<?php echo $editDivId;?>"></div>
                </td>
            </tr>
            <?php
        }//end while loop
    ?>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $('a').click(function(){
            var id = $(this).attr('id');
            var editDivId = "editActionTextDiv" + id;
            $('#'+editDivId).load('files/showeditfnactionform.php?id='+id);
        });
    });//end document.ready function
</script>