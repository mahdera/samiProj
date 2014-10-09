<?php
    $id = $_GET['id'];
    require_once 'goalfirstg3objfn.php';
    require_once 'fn.php';
    //now get all goalfirstg1objfns for this goalfirstg1 id
    $goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($id);
    ?>
    <table border="1" width="100%">
        <tr style="background: #eee">
            <td width="30%">Obj</td>
            <td>Fn</td>
        </tr>
    <?php
    while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
        $fnObj = getFn($goalFirstG3ObjFnRow->fn_id);
        ?>
        <tr>
            <td><?php echo $goalFirstG3ObjFnRow->obj;?></td>
            <td><?php echo $fnObj->fn_name;?></td>
        </tr>
        <?php
    }//end goalFirstG1ObjFnList while loop
?>
    </table>
