<?php
    session_start();
    require_once 'goalfirst.php';
    require_once 'th.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';
    require_once 'fn.php';
    require_once 'goalfirstth.php';

    //$goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
    $goalFirstList = getAllGoalFirstThsModifiedBy($_SESSION['LOGGED_USER_ID']);

    if(mysql_num_rows($goalFirstList)){
        ?>
        <table border="0" width="100%">
            <tr style="background: #cccccc">
                <td width="20%">Th</td>
                <td>G1</td>
            </tr>
            <?php
                $ctr=1;
                while($goalFirstRow = mysql_fetch_object($goalFirstList)){
                    $thRow = getThByIdAndModifiedBy($goalFirstRow->th_id, $_SESSION['LOGGED_USER_ID']);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalFirstG1List = getAllGoalFirstG1ForThisGoalFirstIdAndModifiedBy($goalFirstRow->id, $_SESSION['LOGGED_USER_ID']);
                    ?>
                    <tr>
                        <td><?php echo $thRow->th_name;?></td>
                        <td>
                            <table border="0" width="100%">
                                <tr style="background: #eee">
                                    <td width="20%">G1</td>
                                    <td width="30%">Fn</td>
                                    <td width="50%">Obj & Fn</td>
                                </tr>
                                <?php
                                    while($goalFirstG1Row = mysql_fetch_object($goalFirstG1List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1IdAndModifiedBy($goalFirstG1Row->id, $_SESSION['LOGGED_USER_ID']);
                                        $fn_id = $goalFirstG1Row->fn_id;
                                        $fn_row = getFn($fn_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalFirstG1Row->g1;?></td>
                                            <td><?php echo $fn_row->fn_name;?></td>
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td width="50%">Obj</td>
                                                        <td width="50%">Fn</td>
                                                    </tr>
                                                    <?php
                                                        while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
                                                            $fn_row = getFn($goalFirstG1ObjFnRow->fn_id);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $goalFirstG1ObjFnRow->obj;?></td>
                                                                <td><?php echo $fn_row->fn_name;?></td>
                                                            </tr>
                                                            <?php
                                                        }//end while loop obj & fn
                                                    ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                    }//end g1 while loop
                                ?>
                            </table>
                        </td>
                    </tr>
                    <?php
                }//end while loop
            ?>
        </table>
        <!--now do the same for goal first g2-->
        <table border="0" width="100%">
            <tr style="background: #cccccc">
                <td width="20%">Th</td>
                <td>G2</td>
            </tr>
            <?php
                $ctr=1;
                $goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
                while($goalFirstRow = mysql_fetch_object($goalFirstList)){
                    $thRow = getThByIdAndModifiedBy($goalFirstRow->th_id, $_SESSION['LOGGED_USER_ID']);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalFirstG2List = getAllGoalFirstG2ForThisGoalFirstIdAndModifiedBy($goalFirstRow->id, $_SESSION['LOGGED_USER_ID']);
                    ?>
                    <tr>
                        <td><?php echo $thRow->th_name;?></td>
                        <td>
                            <table border="0" width="100%">
                                <tr style="background: #eee">
                                    <td width="20%">G2</td>
                                    <td width="30%">Fn</td>
                                    <td width="50%">Obj & Fn</td>
                                </tr>
                                <?php
                                    while($goalFirstG2Row = mysql_fetch_object($goalFirstG2List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2IdAndModifiedBy($goalFirstG2Row->id, $_SESSION['LOGGED_USER_ID']);
                                        $fn_row = getFn($goalFirstG2Row->fn_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalFirstG2Row->g2;?></td>
                                            <td><?php echo $fn_row->fn_name;?></td>
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td width="50%">Obj</td>
                                                        <td width="50%">Fn</td>
                                                    </tr>
                                                    <?php
                                                        while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
                                                            $fn_row = getFn($goalFirstG2ObjFnRow->fn_id);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $goalFirstG2ObjFnRow->obj;?></td>
                                                                <td><?php echo $fn_row->fn_name;?></td>
                                                            </tr>
                                                            <?php
                                                        }//end while loop obj & fn
                                                    ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                    }//end g1 while loop
                                ?>
                            </table>
                        </td>
                    </tr>
                    <?php
                }//end while loop
            ?>
        </table>
        <!--now do the same for goal first g3-->
        <table border="0" width="100%">
            <tr style="background: #cccccc">
                <td width="20%">Th</td>
                <td>G3</td>
            </tr>
            <?php
                $ctr=1;
                $goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
                while($goalFirstRow = mysql_fetch_object($goalFirstList)){
                    $thRow = getThByIdAndModifiedBy($goalFirstRow->th_id, $_SESSION['LOGGED_USER_ID']);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalFirstG3List = getAllGoalFirstG3ForThisGoalFirstIdAndModifiedBy($goalFirstRow->id, $_SESSION['LOGGED_USER_ID']);
                    ?>
                    <tr>
                        <td><?php echo $thRow->th_name;?></td>
                        <td>
                            <table border="0" width="100%">
                                <tr style="background: #eee">
                                    <td width="20%">G3</td>
                                    <td width="30%">Fn</td>
                                    <td width="50%">Obj & Fn</td>
                                </tr>
                                <?php
                                    while($goalFirstG3Row = mysql_fetch_object($goalFirstG3List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3IdAndModifiedBy($goalFirstG3Row->id, $_SESSION['LOGGED_USER_ID']);
                                        $fn_row = getFn($goalFirstG3Row->fn_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalFirstG3Row->g3;?></td>
                                            <td><?php echo $fn_row->fn_name;?></td>
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td width="50%">Obj</td>
                                                        <td width="50%">Fn</td>
                                                    </tr>
                                                    <?php
                                                        while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
                                                            $fn_row = getFn($goalFirstG3ObjFnRow->fn_id);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $goalFirstG3ObjFnRow->obj;?></td>
                                                                <td><?php echo $fn_row->fn_name;?></td>
                                                            </tr>
                                                            <?php
                                                        }//end while loop obj & fn
                                                    ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                    }//end g1 while loop
                                ?>
                            </table>
                        </td>
                    </tr>
                    <?php
                }//end while loop
            ?>
        </table>
        <?php
    }//end if
?>
