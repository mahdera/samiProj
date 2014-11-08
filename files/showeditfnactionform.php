<?php
    session_start();
    require_once 'goalsecond.php';
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg1obj.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg2obj.php';
    require_once 'goalsecondg3.php';
    require_once 'goalsecondg3obj.php';
    require_once 'fnaction.php';
    require_once 'fn.php';
    require_once 'goalsecondfn.php';

    $fnActionId = $_GET['id'];
    $fnActionObj = getFnAction($fnActionId);
    $fnEditActionText = "fnEditActionText" . $fnActionId;
    $buttonId = "updateFnActionButton" . $fnActionId;
    $goalSecondFnRow = getGoalSecondFnUsingFnId($fnActionObj->fn_id);
    //$goalSecondFnRow = getGoalSecondUsingFnId($fnActionObj->fn_id);
    $goalSecondFnId = $goalSecondFnRow->id;
    $fnObj = getFn($fnActionObj->fn_id);
    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
    $goalSecondG1ObjId;
    $goalSecondG2Id;
    $goalSecondG1Id;
    $goalSecondG2ObjId;
    $goalSecondG1Ctr=1;
    $goalSecondG2Ctr=1;
    $goalSecondG3Ctr=1;
    //defining the control names in here...
    $goalSecondG1ObjControlName=null;
    $goalSecondG2ObjControlName=null;
    $goalSecondG3ObjControlName=null;
?>
<form>
    <table border="0" width="100%">
        <?php
            $goalSecondG1Row = getGoalSecondG1ForGoalSecondFnId($goalSecondFnRow->id);
            if(!empty($goalSecondG1Row)){
                $goalSecondG1Id = $goalSecondG1Row->id;
            ?>
                <tr>
                    <td width="1%"></td>
                    <td width="10%">G1</td>
                    <td>
                        <input type="text" name="txtg1" id="txtg1" value="<?php echo $goalSecondG1Row->g1;?>"/>
                    </td>
                </tr>
            <?php
                $goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Id);
                if(!empty($goalSecondG1ObjList)){
                    while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){
                        $goalSecondG1ObjControlName = "txtgoalsecondg1obj" . $goalSecondG1Ctr;
                        $goalSecondG1ObjId = $goalSecondG1ObjRow->id;
                        ?>
                            <tr>
                                <td></td>
                                <td>Obj</td>
                                <td>
                                    <input type="text" name="<?php echo $goalSecondG1ObjControlName;?>" id="<?php echo $goalSecondG1ObjControlName;?>" value="<?php echo $goalSecondG1ObjRow->obj;?>"/>
                                </td>
                            </tr>
                        <?php
                        $goalSecondG1Ctr++;
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
    </table>

    <table border="0" width="100%">
        <?php
            $goalSecondG2Row = getGoalSecondG2ForGoalSecondFnId($goalSecondFnRow->id);
            if(!empty($goalSecondG2Row)){
                $goalSecondG2Id = $goalSecondG2Row->id;
            ?>
                <tr>
                    <td width="1%"></td>
                    <td width="10%">G2</td>
                    <td>
                        <input type="text" name="txtg2" id="txtg2" value="<?php echo $goalSecondG2Row->g2;?>"/>
                    </td>
                </tr>
            <?php
                $goalSecondG2ObjList = getAllGoalSecondG2ObjsForThisGoalSecondG2Id($goalSecondG2Id);
                if(!empty($goalSecondG2ObjList)){
                    while($goalSecondG2ObjRow = mysql_fetch_object($goalSecondG2ObjList)){
                        $goalSecondG2ObjControlName = "txtgoalsecondg2obj" . $goalSecondG2Ctr;
                        $goalSecondG2ObjId = $goalSecondG2ObjRow->id;
                        ?>
                            <tr>
                                <td></td>
                                <td>Obj</td>
                                <td>
                                    <input type="text" name="<?php echo $goalSecondG2ObjControlName;?>" id="<?php echo $goalSecondG2ObjControlName;?>" value="<?php echo $goalSecondG2ObjRow->obj;?>"/>
                                </td>
                            </tr>
                        <?php
                        $goalSecondG2Ctr++;
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
    </table>

    <table border="0" width="100%">
        <?php
            $goalSecondG3Row = getGoalSecondG3ForGoalSecondFnId($goalSecondFnRow->id);
            if(!empty($goalSecondG3Row)){
                $goalSecondG3Id = $goalSecondG3Row->id;
            ?>
                <tr>
                    <td width="1%"></td>
                    <td width="10%">G3</td>
                    <td>
                        <input type="text" name="txtg3" id="txtg3" value="<?php echo $goalSecondG3Row->g3;?>"/>
                    </td>
                </tr>
            <?php
                $goalSecondG3ObjList = getAllGoalSecondG3ObjsForThisGoalSecondG3Id($goalSecondG3Id);
                if(!empty($goalSecondG3ObjList)){
                    while($goalSecondG3ObjRow = mysql_fetch_object($goalSecondG3ObjList)){
                        $goalSecondG3ObjControlName = "txtgoalsecondg3obj" . $goalSecondG3Ctr;
                        $goalSecondG3ObjId = $goalSecondG3ObjRow->id;
                        ?>
                            <tr>
                                <td></td>
                                <td>Obj</td>
                                <td>
                                    <input type="text" name="<?php echo $goalSecondG3ObjControlName;?>" id="<?php echo $goalSecondG3ObjControlName;?>" value="<?php echo $goalSecondG3ObjRow->obj;?>"/>
                                </td>
                            </tr>
                        <?php
                        $goalSecondG3Ctr++;
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
    </table>

    <table border="0" width="100%">
        <tr>
            <td width="11%">Fn Action:</td>
            <td>
                <textarea name="<?php echo $fnEditActionText;?>" id="<?php echo $fnEditActionText;?>" style="width: 100%" rows="3"><?php echo $fnActionObj->action_text;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        var fnActionId = "<?php echo $fnActionId;?>";
        //now create the button id here using the actionId i got...
        var buttonId = "updateFnActionButton" + fnActionId;
        var goalSecondG1Ctr = "<?php echo $goalSecondG1Ctr;?>";
        var goalSecondG2Ctr = "<?php echo $goalSecondG2Ctr;?>";
        var goalSecondG3Ctr = "<?php echo $goalSecondG3Ctr;?>";
        goalSecondG1Ctr--;
        goalSecondG2Ctr--;
        goalSecondG3Ctr--;

        $('#'+buttonId).click(function(){
            //now get the update text value..
            var textAreaId = "fnEditActionText" + fnActionId;
            //get the value of the textarea using the textId you just created...
            var textAreaValue = $('#'+textAreaId).val();
            var divId = "editActionTextDiv" + fnActionId;
            //get the counter values for each g1 g2 and g3 now define the control names...
            var goalSecondG1ObjControlName = null;
            var goalSecondG2ObjControlName = null;
            var goalSecondG3ObjControlName = null;
            //get the static control value here...
            var txtG1Val = $('#txtg1').val();
            var txtG2Val = $('#txtg2').val();
            var txtG3Val = $('#txtg3').val();
            //now grab the ids here
            var goalSecondG1Id = "<?php echo $goalSecondG1Id;?>";
            var goalSecondG1ObjId = "<?php echo $goalSecondG1ObjId;?>";
            var goalSecondG2Id = "<?php echo $goalSecondG2Id;?>";
            var goalSecondG2ObjId = "<?php echo $goalSecondG2ObjId;?>";
            var goalSecondG3Id = "<?php echo $goalSecondG3Id;?>";
            var goalSecondG3ObjId = "<?php echo $goalSecondG3ObjId;?>";
            var goalSecondFnId = "<?php echo $goalSecondFnId;?>";

            if(textAreaValue !== ""){
                var dataString = "updatedText="+textAreaValue+"&fnActionId="+fnActionId+"&txtG1Val="+txtG1Val+
                "&txtG2Val="+txtG2Val+"&txtG3Val="+txtG3Val+"&goalSecondG1Id="+goalSecondG1Id+"&goalSecondG1ObjId="+
                goalSecondG1ObjId+"&goalSecondG2Id="+goalSecondG2Id+"&goalSecondG2ObjId="+goalSecondG2ObjId+
                "&goalSecondG3Id="+goalSecondG3Id+"&goalSecondG3ObjId="+goalSecondG3ObjId+"&goalSecondFnId="+goalSecondFnId+
                "&goalSecondG1Ctr="+goalSecondG1Ctr+"&goalSecondG2Ctr="+goalSecondG2Ctr+"&goalSecondG3Ctr="+goalSecondG3Ctr;

                //now get the dynamic values and append it to the dataString variable.
                for(var i=1; i<=goalSecondG1Ctr; i++){
                    var goalSecondG1ObjControlName = "txtgoalsecondg1obj" + i;
                    var goalSecondG1ObjVal = $('#'+goalSecondG1ObjControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalSecondG1ObjControlName+"="+goalSecondG1ObjVal;
                }

                for(var j=1; j<=goalSecondG2Ctr; j++){
                    var goalSecondG2ObjControlName = "txtgoalsecondg2obj" + j;
                    var goalSecondG2ObjVal = $('#'+goalSecondG2ObjControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalSecondG2ObjControlName+"="+goalSecondG2ObjVal;
                }

                for(var k=1; k<=goalSecondG3Ctr; k++){
                    var goalSecondG3ObjControlName = "txtgoalsecondg3obj" + k;
                    var goalSecondG3ObjVal = $('#'+goalSecondG3ObjControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalSecondG3ObjControlName+"="+goalSecondG3ObjVal;
                }

                $.ajax({
                    url: 'files/updatefnaction.php',
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
                alert("You need to enter the fn action text!");
            }
        });
    });//end document.ready fucntion
</script>
