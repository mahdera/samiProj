<?php   
    $goalSecondId = $_GET['id'];
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg1obj.php';
    $goalSecondG1List = getAllGoalSecondG1ForThisGoalSecondId($goalSecondId);
?>
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td>G1</td>
        <td>Objs</td>
    </tr>
    <?php
        while($goalSecondG1Row = mysql_fetch_object($goalSecondG1List)){
            ?>
            <tr>
                <td><?php echo $goalSecondG1Row->g1;?></td>
                <td>
                    <!--now get all the objs associated with this goalSecondg1Id-->
                    <?php
                        $goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Row->id);
                    ?>
                    <table border="0" width="100%">
                        <?php
                            while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $goalSecondG1ObjRow->obj;?>
                                    </td>
                                </tr>
                                <?php
                            }//end while loop
                        ?>
                    </table>
                </td>
            </tr>
            <?php
        }//end while loop
    ?>
</table>
