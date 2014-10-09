<?php
    $id = $_GET['id'];
    require_once 'goalsecondg1obj.php';
    //now get All goalsecondg1objs for this id
    $goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($id);
?>
<table border="1" width="100%">
    <tr style="background: #eee">
        <td>Obj</td>
    </tr>
    <?php
        while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){
            ?>
            <tr>
                <td>
                    <?php echo $goalSecondG1ObjRow->obj;?>
                </td>
            </tr>
            <?php
        }//end goalSecondG1ObjList while loop
    ?>
</table>

