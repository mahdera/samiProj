<?php
    $thId = $_GET['thId'];
    
    require_once 'th.php';
    require_once 'goalfirst.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    
    //now get all goalfirst records associated with this particular thId
    $goalFirstRow = getGoalFirstUsingThId($thId);
    if(!empty($goalFirstRow)){
        //now get all goalfirstg1 records associated with this particualr goalfirstid
        ?>
        <table border="1" width="100%">           
            <?php                    
            $goalFirstG1Row = getGoalFirstG1ForGoalFirst($goalFirstRow->id);
            
            if(!empty($goalFirstG1Row)){                
                ?>
                <tr>
                    <td width="10%"></td>
                    <td>G1</td>
                    <td><?php echo $goalFirstG1Row->g1;?></td>                    
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td>Fn</td>
                    <td><?php echo $goalFirstG1Row->fn;?></td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Row->id);
                    if(!empty($goalFirstG1ObjFnList)){
                        while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
                            ?>
                            <tr>
                                <td width="20%"></td>
                                <td>Obj</td>
                                <td><?php echo $goalFirstG1ObjFnRow->obj;?></td>
                            </tr>
                            <tr>
                                <td width="20%"></td>
                                <td>Fn</td>
                                <td><?php echo $goalFirstG1ObjFnRow->fn;?></td>
                            </tr>
                            <?php
                        }//end while loop
                    }//end if condition for goalFirstG1ObjFnList
                ?>
                <?php                
            }//end empty checking for goalFirstG1List

            ?>
        </table>  
        <!--doing the samething for goalfirstg2...-->
        <table border="1" width="100%">           
            <?php                    
            $goalFirstG2Row = getGoalFirstG2ForGoalFirst($goalFirstRow->id);
            
            if(!empty($goalFirstG2Row)){                
                ?>
                <tr>
                    <td width="10%"></td>
                    <td>G2</td>
                    <td><?php echo $goalFirstG2Row->g2;?></td>                    
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td>Fn</td>
                    <td><?php echo $goalFirstG2Row->fn;?></td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Row->id);
                    if(!empty($goalFirstG2ObjFnList)){
                        while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
                            ?>
                            <tr>
                                <td width="20%"></td>
                                <td>Obj</td>
                                <td><?php echo $goalFirstG2ObjFnRow->obj;?></td>
                            </tr>
                            <tr>
                                <td width="20%"></td>
                                <td>Fn</td>
                                <td><?php echo $goalFirstG2ObjFnRow->fn;?></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    Here goes the action box
                                </td>
                            </tr>
                            <?php
                        }//end while loop
                    }//end if condition for goalFirstG1ObjFnList
                ?>
                <?php                
            }//end empty checking for goalFirstG1List

            ?>
        </table> 
        <!--doing the samething for goalfirstg3...-->
        <table border="1" width="100%">           
            <?php                    
            $goalFirstG3Row = getGoalFirstG3ForGoalFirst($goalFirstRow->id);
            
            if(!empty($goalFirstG3Row)){                
                ?>
                <tr>
                    <td width="10%"></td>
                    <td>G3</td>
                    <td><?php echo $goalFirstG3Row->g3;?></td>                    
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td>Fn</td>
                    <td><?php echo $goalFirstG3Row->fn;?></td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Row->id);
                    if(!empty($goalFirstG3ObjFnList)){
                        while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
                            ?>
                            <tr>
                                <td width="20%"></td>
                                <td>Obj</td>
                                <td><?php echo $goalFirstG3ObjFnRow->obj;?></td>
                            </tr>
                            <tr>
                                <td width="20%"></td>
                                <td>Fn</td>
                                <td><?php echo $goalFirstG3ObjFnRow->fn;?></td>
                            </tr>
                            <?php
                        }//end while loop
                    }//end if condition for goalFirstG1ObjFnList
                ?>
                <?php                
            }//end empty checking for goalFirstG1List

            ?>
        </table> 
        <?php    
    }//end if condition
?>
