<?php
    session_start();
    require_once 'goalsecond.php';
    require_once 'fn.php';
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg3obj.php';
    
    $goalSecondList = getAllGoalSecondsModifiedBy($_SESSION['LOGGED_USER_ID']);
    
    if(!empty($goalSecondList)){
        ?>
        <table border="1" width="100%">
            <tr style="background: #cccccc">
                <td>#</td>
                <td>Fn</td> 
                <td>G1 & Obj</td>                
            </tr>
            <?php
                $ctr=1;
                while($goalSecondRow = mysql_fetch_object($goalSecondList)){
                    $fnRow = getFn($goalSecondRow->fn_id);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalSecondG1List = getAllGoalSecondG1ForThisGoalSecondId($goalSecondRow->id);
                    ?>
                    <tr>
                        <td><?php echo $ctr++;?></td>
                        <td><?php echo $fnRow->fn_name;?></td>  
                        <td>
                            <table border="1" width="100%">
                                <tr style="background: #eee">
                                    <td>G1</td>                                    
                                    <td>Obj</td>
                                </tr>
                                <?php
                                    while($goalSecondG1Row = mysql_fetch_object($goalSecondG1List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Row->id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalSecondG1Row->g1;?></td>                                            
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td>Obj</td>                                                        
                                                    </tr>
                                                    <?php
                                                        while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $goalSecondG1ObjRow->obj;?></td>                                                                
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
        <!--do the same thing for g2-->
        <table border="1" width="100%">
            <tr style="background: #cccccc">
                <td>#</td>
                <td>Fn</td> 
                <td>G2 & Obj</td>                
            </tr>
            <?php
                $goalSecondList = getAllGoalSeconds();
                $ctr=1;
                while($goalSecondRow = mysql_fetch_object($goalSecondList)){
                    $fnRow = getFn($goalSecondRow->fn_id);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalSecondG2List = getAllGoalSecondG2ForThisGoalSecondId($goalSecondRow->id);
                    ?>
                    <tr>
                        <td><?php echo $ctr++;?></td>
                        <td><?php echo $fnRow->fn_name;?></td>  
                        <td>
                            <table border="1" width="100%">
                                <tr style="background: #eee">
                                    <td>G2</td>                                    
                                    <td>Obj</td>
                                </tr>
                                <?php
                                    while($goalSecondG2Row = mysql_fetch_object($goalSecondG2List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalSecondG2ObjList = getAllGoalSecondG2ObjsForThisGoalSecondG2Id($goalSecondG2Row->id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalSecondG2Row->g2;?></td>                                            
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td>Obj</td>                                                        
                                                    </tr>
                                                    <?php
                                                        while($goalSecondG2ObjRow = mysql_fetch_object($goalSecondG2ObjList)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $goalSecondG2ObjRow->obj;?></td>                                                                
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
        <!--do the same thing for g3-->
        <table border="1" width="100%">
            <tr style="background: #cccccc">
                <td>#</td>
                <td>Fn</td> 
                <td>G3 & Obj</td>                
            </tr>
            <?php
                $goalSecondList = getAllGoalSeconds();
                $ctr=1;
                while($goalSecondRow = mysql_fetch_object($goalSecondList)){
                    $fnRow = getFn($goalSecondRow->fn_id);
                    //now get all the goalFirstG1 objects for this particular goalFirstId
                    $goalSecondG3List = getAllGoalSecondG3ForThisGoalSecondId($goalSecondRow->id);
                    ?>
                    <tr>
                        <td><?php echo $ctr++;?></td>
                        <td><?php echo $fnRow->fn_name;?></td>  
                        <td>
                            <table border="1" width="100%">
                                <tr style="background: #eee">
                                    <td>G3</td>                                    
                                    <td>Obj</td>
                                </tr>
                                <?php
                                    while($goalSecondG3Row = mysql_fetch_object($goalSecondG3List)){
                                        //now get all the goalFirstG1ObjFn associated with this particular goalFirstG1Id
                                        $goalSecondG3ObjList = getAllGoalSecondG3ObjsForThisGoalSecondG3Id($goalSecondG3Row->id);
                                        ?>
                                        <tr>
                                            <td><?php echo $goalSecondG3Row->g3;?></td>                                            
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td>Obj</td>                                                        
                                                    </tr>
                                                    <?php
                                                        while($goalSecondG3ObjRow = mysql_fetch_object($goalSecondG3ObjList)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $goalSecondG3ObjRow->obj;?></td>                                                                
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
