<?php
    $id = $_GET['id'];
    require_once 'goalfirstg1objfn.php';
    require_once 'fn.php';
    //now get all goalfirstg1objfns for this goalfirstg1 id
    $goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($id);
    ?>
    <table border="1" width="100%">
        <tr style="background: #eee">
            <td>Obj</td>
            <td>Fn</td>
        </tr>
    <?php
    while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
        $fnObj = getFn($goalFirstG1ObjFnRow->fn_id);
        ?>
        <tr>
            <td><?php echo $goalFirstG1ObjFnRow->obj;?></td>
            <td><?php echo $fnObj->fn_name;?></td>
        </tr>
        <?php
    }//end goalFirstG1ObjFnList while loop
?>
    </table>
