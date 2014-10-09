<?php
    $id = $_GET['id'];
    require_once 'goalfirst.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg3.php';
    require_once 'fn.php';
    //First I need to get the associated goal first for this th
    $goalFirstList = getAllGoalFirstsUsingThId($id);
    //now get all goalfirstg1s for this goal first
    ?>
    <table border="1" width="100%">
        <tr style="background: #eee">
            <td>G1</td>
            <td>Fn</td>
        </tr>
    <?php
        while($goalFirstRow = mysql_fetch_object($goalFirstList)){
            //now get goalfirstg1 for each particular goalFirstRows...
            $goalFirstG1List = getAllGoalFirstG1ForThisGoalFirstId($goalFirstRow->id);
            while($goalFirstG1Row = mysql_fetch_object($goalFirstG1List)){
                $fnObj = getFn($goalFirstG1Row->fn_id);
                ?>
                <tr>
                    <td><?php echo $goalFirstG1Row->g1;?></td>
                    <td><?php echo $fnObj->fn_name;?></td>
                </tr>
                <?php
            }//end goalFirstG1List
        }//end goalFirstList while loop
    ?>
</table>
