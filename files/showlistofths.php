<?php
    require_once 'th.php';
    
    $thList = getAllThs();
?>
<table border="0" width="100%">
    <tr>
        <td>#</td>
        <td>Th Name</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php
        $ctr=1;
        while($thRow = mysql_fetch_object($thList)){
            ?>
                <tr>
                    <td><?php echo $ctr++;?></td>
                    <td><?php echo $thRow->th_name; ?></td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            <?php
        }//end while loop
    ?>
</table>
