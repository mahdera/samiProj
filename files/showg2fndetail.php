<?php
    $id = $_GET['id'];
    require_once 'goalfirstg2objfn.php';
    require_once 'fn.php';
    //now get all goalfirstg1objfns for this goalfirstg1 id
    $goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($id);
    ?>
    <table border="1" width="100%">
        <tr style="background: #eee">
            <td width="30%">Obj</td>
            <td>Fn</td>
        </tr>
    <?php
    while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
        $fnObj = getFn($goalFirstG2ObjFnRow->fn_id);
        ?>
        <tr>
            <td><?php echo $goalFirstG2ObjFnRow->obj;?></td>
            <td><?php echo $fnObj->fn_name;?></td>
        </tr>
        <?php
    }//end goalFirstG1ObjFnList while loop
?>
    </table>
