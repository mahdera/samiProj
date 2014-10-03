<h2>Edit Th Action</h2>
<?php
    require_once 'files/thaction.php';
    require_once 'files/th.php';
    $thActionList = getAllThActions();
?>
<table border="1" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Th</td>
        <td>Th Action Text</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;
        while($thActionRow = mysql_fetch_object($thActionList)){
            $thObj = getTh($thActionRow->th_id);            
            ?>
            <tr>
                <td><?php echo $ctr++;?></td>
                <td><?php echo $thObj->th_name;?></td>
                <td><?php echo $thActionRow->action_text;?></td>
                <td>
                    <?php
                        $editLinkId = $thActionRow->id;
                        $editDivId = "editActionTextDiv" . $thActionRow->id
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
            $('#'+editDivId).load('files/showeditthactionform.php?id='+id);
        });
    });//end document.ready function
</script>