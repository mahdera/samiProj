<?php
    session_start();
?>
<?php
    require_once 'th.php';
    $thList = getAllThsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="1" width="100%">
    <tr style="background: #ccc">
        <td>Ser.No</td>
        <td>Th Name</td>
        <td>Action</td>
    </tr>
    <?php
        $ctr=1;
        while($thRow = mysql_fetch_object($thList)){
            $divId = "thEditDiv" . $thRow->id;
            ?>
            <tr>
                <td><?php echo $ctr;?></td>
                <td><?php echo stripslashes($thRow->th_name);?></td>
                <td>
                    [<a href="#.php" class="showThDetailsLink" id="<?php echo $thRow->id;?>">Show</a> | <a href="#.php" class="hideThDetailsLink" id="<?php echo $thRow->id;?>">Hide</a>]
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

        $('.showThDetailsLink').click(function(){
            var id = $(this).attr('id');
            var divId = "thEditDiv" + id;
            $('#'+divId).load('files/showg1andfnsforthisth.php?id='+id,{noncache: new Date().getTime()});
        });

        $('.hideThDetailsLink').click(function(){
            var id = $(this).attr('id');
            var divId = "thEditDiv" + id;
            $('#'+divId).html('');
        });

    });//end document.ready function
</script>
