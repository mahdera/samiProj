<?php
    $id = $_GET['id'];
    require_once 'goalsecondg2obj.php';
    //now get All goalsecondg1objs for this id
    $goalSecondG2ObjList = getAllGoalSecondG2ObjsForThisGoalSecondG2Id($id);
?>
<table border="1" width="100%">
    <tr style="background: #eee">
        <td>Obj</td>
    </tr>
    <?php
        while($goalSecondG2ObjRow = mysql_fetch_object($goalSecondG2ObjList)){
            ?>
            <tr>
                <td>
                    <?php echo $goalSecondG2ObjRow->obj;?>
                </td>
            </tr>
            <?php
        }//end goalSecondG1ObjList while loop
    ?>
</table>
