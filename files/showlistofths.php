<?php
    require_once 'th.php';
    
    $thList = getAllThs();
?>
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td></td>
        <td>Th Name</td>
        <td>Edit</td>
        <td></td>
    </tr>
    <?php
        $ctr=1;
        while($thRow = mysql_fetch_object($thList)){
            $divId = "thEditDiv" . $thRow->id;
            ?>
                <tr>
                    <td></td>
                    <td><?php echo $thRow->th_name; ?></td>
                    <td><a href="#.php" id="<?php echo $thRow->id;?>" class="editThLink">Edit</a></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div id="<?php echo $divId;?>"></div>
                    </td>
                </tr>
            <?php
        }//end while loop
    ?>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('.editThLink').click(function(){
            var id = $(this).attr('id');
            var divId = "thEditDiv" + id;
            $('#'+divId).load('files/showeditfieldsofth.php?id='+id);
        });
        
    });//end document.ready function
</script>