<?php
    //this file should list only those ths now having th action filled for them...
    $thId = $_GET['thId'];
    
    require_once 'th.php';
    require_once 'goalfirst.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';
    require_once 'fn.php';
    
    //now get all goalfirst records associated with this particular thId
    $goalFirstRow = getGoalFirstUsingThId($thId);
    if(!empty($goalFirstRow)){
        //now get all goalfirstg1 records associated with this particualr goalfirstid
        ?>
        <table border="0" width="100%">           
            <?php                    
            $goalFirstG1Row = getGoalFirstG1ForGoalFirst($goalFirstRow->id);
            
            if(!empty($goalFirstG1Row)){  
                $fn_row = getFn($goalFirstG1Row->fn_id);
                ?>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">G1</td>
                    <td><?php echo $goalFirstG1Row->g1;?></td>                    
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">Fn</td>
                    <td><?php echo $fn_row->fn_name;?></td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Row->id);
                    if(!empty($goalFirstG1ObjFnList)){
                        while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
                            $fn_row = getFn($goalFirstG1ObjFnRow->fn_id);
                            ?>
                            <tr>
                                <td width="30%"></td>
                                <td width="30%">Obj</td>
                                <td><?php echo $goalFirstG1ObjFnRow->obj;?></td>
                            </tr>
                            <tr>
                                <td width="30%"></td>
                                <td width="30%">Fn</td>
                                <td><?php echo $fn_row->fn_name;?></td>
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
        <table border="0" width="100%">           
            <?php                    
            $goalFirstG2Row = getGoalFirstG2ForGoalFirst($goalFirstRow->id);
            
            if(!empty($goalFirstG2Row)){    
                $fn_row = getFn($goalFirstG2Row->fn_id);
                ?>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">G2</td>
                    <td><?php echo $goalFirstG2Row->g2;?></td>                    
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">Fn</td>
                    <td><?php echo $fn_row->fn_name;?></td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Row->id);
                    if(!empty($goalFirstG2ObjFnList)){
                        while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
                            $fn_row = getFn($goalFirstG2ObjFnRow->fn_id);
                            ?>
                            <tr>
                                <td width="30%"></td>
                                <td width="30%">Obj</td>
                                <td><?php echo $goalFirstG2ObjFnRow->obj;?></td>
                            </tr>
                            <tr>
                                <td width="30%"></td>
                                <td width="30%">Fn</td>
                                <td><?php echo $fn_row->fn_name;?></td>
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
        <table border="0" width="100%">           
            <?php                    
            $goalFirstG3Row = getGoalFirstG3ForGoalFirst($goalFirstRow->id);
            
            if(!empty($goalFirstG3Row)){                
                $fn_row = getFn($goalFirstG3Row->fn_id);
                ?>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">G3</td>
                    <td><?php echo $goalFirstG3Row->g3;?></td>                    
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">Fn</td>
                    <td><?php echo $fn_row->fn_name;?></td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Row->id);
                    if(!empty($goalFirstG3ObjFnList)){
                        while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
                            $fn_row = getFn($goalFirstG3ObjFnRow->fn_id);
                            ?>
                            <tr>
                                <td width="30%"></td>
                                <td width="30%">Obj</td>
                                <td><?php echo $goalFirstG3ObjFnRow->obj;?></td>
                            </tr>
                            <tr>
                                <td width="30%"></td>
                                <td width="30%">Fn</td>
                                <td><?php echo $fn_row->fn_name;?></td>
                            </tr>
                            <?php
                        }//end while loop
                    }//end if condition for goalFirstG1ObjFnList
                ?>
                <?php                
            }//end empty checking for goalFirstG1List

            ?>
        </table> 
        <table border="0" width="100%">
            <tr>
                <td width="30%">
                    Add Action
                </td>
                <td>
                    <?php
                        //the name should be dynamic...
                        $textAreaId = "thAction_" . $thId;
                        $buttonId = "thAddAction_" . $thId;
                    ?>
                    <textarea name="<?php echo $textAreaId;?>" id="<?php echo $textAreaId;?>" style="width: 100%" rows="3"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="button" value="Add Action" id="<?php echo $buttonId;?>"/>                    
                </td>
            </tr>
        </table>
        <?php    
    }else{
        echo '<div class="notify notify-red"><span class="symbol icon-error"></span> No Associated Th Record Found!</div>';
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        var thId = "<?php echo $thId;?>";
        var textAreaId = "thAction_" + thId;
        var buttonId = "thAddAction_" + thId;
        var divId = "actionDiv" + thId;
        
        $('#'+buttonId).click(function(){
            //now get the value from the textarea...
            var textAreaValue = $('#'+textAreaId).val();
            var dataString = "thId="+thId+"&textAreaValue="+textAreaValue;
            //now save this part and update the div about the status of the save transaction
            if(textAreaValue !== ''){
                $.ajax({
                    url: 'files/savethaction.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){                     
                        $('#'+divId).html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert('Enter the Th Action text!');
            }
        });
    });//end document.ready function
</script>
