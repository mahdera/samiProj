<?php
    session_start();
    $fn_id = $_GET['fn_id'];    
    require_once 'goalsecond.php';
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg3obj.php';
    require_once 'fnaction.php';  
    require_once 'fn.php';  
    
    //$fnActionId = $_GET['fn_id'];    
    //$fnActionObj = getFnAction($fnActionId);    
    $fnEditActionText = "fnEditActionText" . $fn_id;
    $buttonId = "updateFnActionButton" . $fn_id;
    $goalSecondRow = getGoalSecondUsingFnId($fn_id);
    $goalSecondId = $goalSecondRow->id;
    $fnObj = getFn($fn_id);
    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
    //now I got all the result set read from the database...lets do the iteration thing now...
    $fn = getFn($fn_id);
    $countVal=0;
    $countVal = doesThisFnAlreadyActionFilledForIt($fn_id);
    if(!$countVal){
?>
<form>
    <table border="0" width="100%">
        <?php
            $goalSecondG1Row = getGoalSecondG1ForGoalSecondId($goalSecondId);
            if(!empty($goalSecondG1Row)){
                $goalSecondG1Id = $goalSecondG1Row->id;
            ?>
                <tr>
                    <td width="1%"></td>
                    <td width="10%">G1</td>
                    <td>
                        <?php echo $goalSecondG1Row->g1;?>
                    </td>
                </tr>
            <?php
                $goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Id);
                if(!empty($goalSecondG1ObjList)){
                    while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){                        
                        $goalSecondG1ObjId = $goalSecondG1ObjRow->id;
                        ?>
                            <tr>
                                <td></td>
                                <td>Obj</td>
                                <td>
                                    <?php echo $goalSecondG1ObjRow->obj;?>
                                </td>
                            </tr>
                        <?php                        
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
    </table>

    <table border="0" width="100%">
        <?php
            $goalSecondG2Row = getGoalSecondG2ForGoalSecondId($goalSecondId);
            if(!empty($goalSecondG2Row)){
                $goalSecondG2Id = $goalSecondG2Row->id;
            ?>
                <tr>
                    <td width="1%"></td>
                    <td width="10%">G2</td>
                    <td>
                        <?php echo $goalSecondG2Row->g2;?>
                    </td>
                </tr>
            <?php
                $goalSecondG2ObjList = getAllGoalSecondG2ObjsForThisGoalSecondG2Id($goalSecondG2Id);
                if(!empty($goalSecondG2ObjList)){
                    while($goalSecondG2ObjRow = mysql_fetch_object($goalSecondG2ObjList)){                        
                        $goalSecondG2ObjId = $goalSecondG2ObjRow->id;
                        ?>
                            <tr>
                                <td></td>
                                <td>Obj</td>
                                <td>
                                    <?php echo $goalSecondG2ObjRow->obj;?>
                                </td>
                            </tr>
                        <?php                        
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
    </table>

    <table border="0" width="100%">
        <?php
            $goalSecondG3Row = getGoalSecondG3ForGoalSecondId($goalSecondId);
            if(!empty($goalSecondG3Row)){
                $goalSecondG3Id = $goalSecondG3Row->id;
            ?>
                <tr>
                    <td width="1%"></td>
                    <td width="10%">G3</td>
                    <td>
                        <?php echo $goalSecondG3Row->g3;?>
                    </td>
                </tr>
            <?php
                $goalSecondG3ObjList = getAllGoalSecondG3ObjsForThisGoalSecondG3Id($goalSecondG3Id);
                if(!empty($goalSecondG3ObjList)){
                    while($goalSecondG3ObjRow = mysql_fetch_object($goalSecondG3ObjList)){                        
                        $goalSecondG3ObjId = $goalSecondG3ObjRow->id;
                        ?>
                            <tr>
                                <td></td>
                                <td>Obj</td>
                                <td>
                                    <?php echo $goalSecondG3ObjRow->obj;?>
                                </td>
                            </tr>
                        <?php                        
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
    </table>

    <table border="0" width="100%">
        <tr>
            <td>Add Action</td>
            <td>
                <?php
                    //the name should be dynamic...
                    $textAreaId = "fnAction_" . $fn_id;
                    $buttonId = "fnAddAction_" . $fn_id;
                ?>
                <textarea name="<?php echo $textAreaId;?>" id="<?php echo $textAreaId;?>" rows="3" style="width: 100%"></textarea> 
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Add Action" id="<?php echo $buttonId;?>"/>                    
            </td>
        </tr>
    </table>
</form>
<?php
}else{
    echo '<div class="notify notify-yellow"><span class="symbol icon-excl"></span> You Already Added Action to this Fn Record!</div>';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var fnId = "<?php echo $fn_id;?>";
        var textAreaId = "fnAction_" + fnId;
        var buttonId = "fnAddAction_" + fnId;
        var divId = "actionDiv" + fnId;
        
        $('#'+buttonId).click(function(){
            //now get the value from the textarea...
            var textAreaValue = $('#'+textAreaId).val();
            var dataString = "fnId="+fnId+"&textAreaValue="+textAreaValue;
            //alert(dataString);
            //now save this part and update the div about the status of the save transaction
            if(textAreaValue !== ''){
                $.ajax({
                    url: 'files/savefnaction.php',        
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
                alert('Enter the Fn Action text!');
            }
        });
    });//end document.ready function
</script>

