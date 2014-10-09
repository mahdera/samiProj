<?php
    require_once 'th.php';
    $thList = getAllThs();
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
                <td><?php echo $thRow->th_name;?></td>
                <td>
                    [Show | Hide]
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