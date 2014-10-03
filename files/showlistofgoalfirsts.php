<?php
    require_once 'goalfirst.php';
    require_once 'th.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';
    require_once 'fn.php';
    
    $goalFirstList = getAllGoalFirsts();
    
    if(!empty($goalFirstList)){
        ?>
        <table border="1" width="100%">
            <tr style="background: #cccccc">
                <td>#</td>
                <td>Th</td> 
                <td>G1</td>
            </tr>
            <?php
                $ctr=1;
                while($goalFirstRow = mysql_fetch_object($goalFirstList)){
                    $thRow = getTh($goalFirstRow->th_id);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalFirstG1List = getAllGoalFirstG1ForThisGoalFirstId($goalFirstRow->id);
                    ?>
                    <tr>
                        <td><?php echo $ctr++;?></td>
                        <td><?php echo $thRow->th_name;?></td>  
                        <td>
                            <table border="1" width="100%">
                                <tr style="background: #eee">
                                    <td>G1</td>
                                    <td>Fn</td> 
                                    <td>Obj & Fn</td>
                                </tr>
                                <?php
                                    while($goalFirstG1Row = mysql_fetch_object($goalFirstG1List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Row->id);
                                        $fn_id = $goalFirstG1Row->fn_id;
                                        $fn_row = getFn($fn_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalFirstG1Row->g1;?></td>
                                            <td><?php echo $fn_row->fn_name;?></td>
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td>Obj</td>
                                                        <td>Fn</td>
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
        <table border="1" width="100%">
            <tr style="background: #cccccc">
                <td>#</td>
                <td>Th</td> 
                <td>G2</td>
            </tr>
            <?php
                $ctr=1;
                $goalFirstList = getAllGoalFirsts();
                while($goalFirstRow = mysql_fetch_object($goalFirstList)){
                    $thRow = getTh($goalFirstRow->th_id);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalFirstG2List = getAllGoalFirstG2ForThisGoalFirstId($goalFirstRow->id);
                    ?>
                    <tr>
                        <td><?php echo $ctr++;?></td>
                        <td><?php echo $thRow->th_name;?></td>  
                        <td>
                            <table border="1" width="100%">
                                <tr style="background: #eee">
                                    <td>G2</td>
                                    <td>Fn</td> 
                                    <td>Obj & Fn</td>
                                </tr>
                                <?php
                                    while($goalFirstG2Row = mysql_fetch_object($goalFirstG2List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Row->id);
                                        $fn_row = getFn($goalFirstG2Row->fn_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalFirstG2Row->g2;?></td>
                                            <td><?php echo $fn_row->fn_name;?></td>
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td>Obj</td>
                                                        <td>Fn</td>
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
        <table border="1" width="100%">
            <tr style="background: #cccccc">
                <td>#</td>
                <td>Th</td> 
                <td>G3</td>
            </tr>
            <?php
                $ctr=1;
                $goalFirstList = getAllGoalFirsts();
                while($goalFirstRow = mysql_fetch_object($goalFirstList)){
                    $thRow = getTh($goalFirstRow->th_id);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalFirstG3List = getAllGoalFirstG3ForThisGoalFirstId($goalFirstRow->id);
                    ?>
                    <tr>
                        <td><?php echo $ctr++;?></td>
                        <td><?php echo $thRow->th_name;?></td>  
                        <td>
                            <table border="1" width="100%">
                                <tr style="background: #eee">
                                    <td>G3</td>
                                    <td>Fn</td> 
                                    <td>Obj & Fn</td>
                                </tr>
                                <?php
                                    while($goalFirstG3Row = mysql_fetch_object($goalFirstG3List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Row->id);
                                        $fn_row = getFn($goalFirstG3Row->fn_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalFirstG3Row->g3;?></td>
                                            <td><?php echo $fn_row->fn_name;?></td>
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td>Obj</td>
                                                        <td>Fn</td>
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
