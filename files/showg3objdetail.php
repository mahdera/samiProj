<?php
    $id = $_GET['id'];
    require_once 'goalsecondg3obj.php';
    //now get All goalsecondg1objs for this id
    $goalSecondG3ObjList = getAllGoalSecondG3ObjsForThisGoalSecondG3Id($id);
?>
<table border="1" width="100%">
    <tr style="background: #eee">
        <td>Obj</td>
    </tr>
    <?php
        while($goalSecondG3ObjRow = mysql_fetch_object($goalSecondG3ObjList)){
            ?>
            <tr>
                <td>
                    <?php echo $goalSecondG3ObjRow->obj;?>
                </td>
            </tr>
            <?php
        }//end goalSecondG1ObjList while loop
    ?>
</table>

