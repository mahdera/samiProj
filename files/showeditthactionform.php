<?php
    $thActionId = $_GET['thId'];
    require_once 'th.php';
    require_once 'goalfirst.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3.php';
    require_once 'goalfirstg3objfn.php';
    require_once 'fn.php';
    require_once 'thaction.php';

    $thActionObj = getThAction($thActionId);
    $thEditActionText = "thEditActionText" . $thActionId;
    $buttonId = "updateThActionButton" . $thActionId;
    $thObj = getTh($thActionObj->th_id);       
    $goalFirstRow = getGoalFirstUsingThId($thObj->id);
    //define the control names in here    
?>
<form>
    <table border="0" width="100%">           
            <?php                    
            $goalFirstG1Row = getGoalFirstG1ForGoalFirst($goalFirstRow->id);
            $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
            
            if(!empty($goalFirstG1Row)){  
                $fn_row = getFn($goalFirstG1Row->fn_id);
                ?>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">G1</td>
                    <td>
                        <input type="text" name="" id="" value="<?php echo $goalFirstG1Row->g1;?>"/>
                    </td>                    
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td width="30%">Fn</td>
                    <td>
                        <select name="" id="" style="width:100%">
                            <option value="" selected="selected">--Select--</option>
                            <?php
                                foreach ($variable as $key => $value) {
                                    # code...
                                }
                            ?>
                        </select>
                        <?php echo $fn_row->fn_name;?>
                    </td>
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
            <td width="10%">Th Action:</td>
            <td>
                <textarea name="<?php echo $thEditActionText;?>" id="<?php echo $thEditActionText;?>" style="width: 100%" rows="3"><?php echo $thActionObj->action_text;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                <input type="reset" value="Undo"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        var thActionId = "<?php echo $thActionId;?>";
        //now create the button id here using the actionId i got...
        var buttonId = "updateThActionButton" + thActionId;
        
        $('#'+buttonId).click(function(){
            //now get the update text value..
            var textAreaId = "thEditActionText" + thActionId;
            //get the value of the textarea using the textId you just created...
            var textAreaValue = $('#'+textAreaId).val();
            var divId = "editActionTextDiv" + thActionId;
            
            if(textAreaValue !== ""){
                var dataString = "updatedText="+textAreaValue+"&thActionId="+thActionId;
                $.ajax({
                    url: 'files/updatethaction.php',        
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
                alert("You need to enter the th action text!");
            }
        });
    });//end document.ready fucntion
</script>