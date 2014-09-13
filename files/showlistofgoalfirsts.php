<?php
    require_once 'goalfirst.php';
    require_once 'th.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';
    
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
                                        ?>
                                        <tr>
                                            <td><?php echo $goalFirstG1Row->g1;?></td>
                                            <td><?php echo $goalFirstG1Row->fn;?></td>
                                            <td>
                                                <table border="0" width="100%">
                                                    <tr style="background: lightblue">
                                                        <td>Obj</td>
                                                        <td>Fn</td>
                                                    </tr>
                                                    <?php
                                                        while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $goalFirstG1ObjFnRow->obj;?></td>
                                                                <td><?php echo $goalFirstG1ObjFnRow->fn;?></td>
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
