<?php
    session_start();
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
    require_once 'thaction.php';

    //$thActionObj = getThAction($thActionId);
    $thEditActionText = "thEditActionText" . $thId;
    $buttonId = "updateGoalFirstButton" . $thId;
    $thObj = getTh($thId);
    $goalFirstRow = getGoalFirstUsingThId($thId);
    $goalFirstId = $goalFirstRow->id;
    //define the control names in here
    $goalFirstG1Ctr = 1;
    $goalFirstG2Ctr = 1;
    $goalFirstG3Ctr = 1;
    $goalFirstG1ObjControlName=null;
    $goalFirstG1FnControlName=null;
    $goalFirstG2ObjControlName=null;
    $goalFirstG2FnControlName=null;
    $goalFirstG3ObjControlName=null;
    $goalFirstG3FnControlName=null;
    $goalFirstG1Id;
    $goalFirstG1ObjFnId;
    $goalFirstG2Id;
    $goalFirstG2ObjFnId;
    $goalFirstG3Id;
    $goalFirstG3ObjFnId;
?>
<form>
    <table border="0" width="100%">
            <?php
            $goalFirstG1Row = getGoalFirstG1ForGoalFirst($goalFirstRow->id);
            $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
            $goalFirstG1Id = $goalFirstG1Row->id;

            if(!empty($goalFirstG1Row)){
                $fn_row = getFn($goalFirstG1Row->fn_id);
                ?>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">G1</td>
                    <td>
                        <input type="text" name="txtg1" id="txtg1" value="<?php echo $goalFirstG1Row->g1;?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">Fn</td>
                    <td>
                        <select name="slctfn1" id="slctfn1" style="width:100%">
                            <option value="" selected="selected">--Select--</option>
                            <?php
                                foreach ($fnIdArray as $fnId) {
                                    $fnObj = getFn($fnId);
                                    if($fnId === $goalFirstG1Row->fn_id){
                                        ?>
                                            <option value="<?php echo $fnObj->id;?>" selected="selected"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }else{
                                        ?>
                                            <option value="<?php echo $fnObj->id;?>"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }
                                }//end foreach loop
                            ?>
                        </select>
                    </td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Row->id);
                    if(!empty($goalFirstG1ObjFnList)){
                        while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
                            $goalFirstG1ObjFnId = $goalFirstG1ObjFnRow->id;
                            $fn_row = getFn($goalFirstG1ObjFnRow->fn_id);
                            //define the control name in here...
                            $goalFirstG1ObjControlName = "txtgoalfirstg1obj" . $goalFirstG1Ctr;
                            $goalFirstG1FnControlName = "slctgoalfirstg1fn" . $goalFirstG1Ctr;
                            ?>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Obj</td>
                                <td>
                                    <input type="text" name="<?php echo $goalFirstG1ObjControlName;?>" id="<?php echo $goalFirstG1ObjControlName;?>" value="<?php echo $goalFirstG1ObjFnRow->obj;?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Fn</td>
                                <td>
                                    <select name="<?php echo $goalFirstG1FnControlName;?>" id="<?php echo $goalFirstG1FnControlName;?>" style="width:100%">
                                        <option value="">--Select--</option>
                                        <?php
                                            foreach ($fnIdArray as $fnId) {
                                                $fnObj = getFn($fnId);
                                                if($fnId === $goalFirstG1ObjFnRow->fn_id){
                                                    ?>
                                                        <option value="<?php echo $fnObj->id;?>" selected="selected"><?php echo $fnObj->fn_name;?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?php echo $fnObj->id;?>"><?php echo $fnObj->fn_name;?></option>
                                                    <?php
                                                }
                                            }//end foreach loop
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $goalFirstG1Ctr++;
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
                $goalFirstG2Id = $goalFirstG2Row->id;
                ?>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">G2</td>
                    <td>
                        <input type="text" name="txtg2" id="txtg2" value="<?php echo $goalFirstG2Row->g2;?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">Fn</td>
                    <td>
                        <select name="slctfn2" id="slctfn2" style="width:100%">
                            <option value="">--Select--</option>
                            <?php
                                foreach ($fnIdArray as $fnId) {
                                    $fnObj = getFn($fnId);
                                    if($fnId === $goalFirstG2Row->fn_id){
                                        ?>
                                            <option value="<?php echo $fnObj->id;?>" selected="selected"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }else{
                                        ?>
                                            <option value="<?php echo $fnObj->id;?>"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }
                                }//end foreach loop
                            ?>
                        </select>
                    </td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Row->id);
                    if(!empty($goalFirstG2ObjFnList)){
                        while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
                            $goalFirstG2ObjFnId = $goalFirstG2ObjFnRow->id;
                            $fn_row = getFn($goalFirstG2ObjFnRow->fn_id);
                            $goalFirstG2ObjControlName = "txtgoalfirstg2obj" . $goalFirstG2Ctr;
                            $goalFirstG2FnControlName = "slctgoalfirstg2fn" . $goalFirstG2Ctr;
                            ?>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Obj</td>
                                <td>
                                    <input type="text" name="<?php echo $goalFirstG2ObjControlName;?>" id="<?php echo $goalFirstG2ObjControlName;?>" value="<?php echo $goalFirstG2ObjFnRow->obj;?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Fn</td>
                                <td>
                                    <select name="<?php echo $goalFirstG2FnControlName;?>" id="<?php echo $goalFirstG2FnControlName;?>" style="width:100%">
                                    <option value="">--Select--</option>
                                    <?php
                                        foreach ($fnIdArray as $fnId) {
                                            $fnObj = getFn($fnId);
                                            if($fnId === $goalFirstG2ObjFnRow->fn_id){
                                                ?>
                                                    <option value="<?php echo $fnObj->id;?>" selected="selected"><?php echo $fnObj->fn_name;?></option>
                                                <?php
                                            }else{
                                                ?>
                                                    <option value="<?php echo $fnObj->id;?>"><?php echo $fnObj->fn_name;?></option>
                                                <?php
                                            }
                                        }//end foreach loop
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $goalFirstG2Ctr++;
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
                $goalFirstG3Id = $goalFirstG3Row->id;
                $fn_row = getFn($goalFirstG3Row->fn_id);
                ?>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">G3</td>
                    <td>
                        <input type="text" name="txtg3" id="txtg3" value="<?php echo $goalFirstG3Row->g3;?>"/>
                    </td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">Fn</td>
                    <td>
                        <select name="slctfn3" id="slctfn3" style="width:100%">
                            <option value="">--Select--</option>
                            <?php
                                foreach ($fnIdArray as $fnId) {
                                    $fnObj = getFn($fnId);
                                    if($fnId === $goalFirstG3Row->fn_id){
                                        ?>
                                            <option value="<?php echo $fnObj->id;?>" selected="selected"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }else{
                                        ?>
                                            <option value="<?php echo $fnObj->id;?>"><?php echo $fnObj->fn_name;?></option>
                                        <?php
                                    }
                                }//end foreach loop
                            ?>
                        </select>
                    </td>
                </tr>
                <?php
                    //now get all the obj fn values for this particular goalFirstG1Id
                    $goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Row->id);
                    if(!empty($goalFirstG3ObjFnList)){
                        while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
                            $goalFirstG3ObjFnId = $goalFirstG3ObjFnRow->id;
                            $fn_row = getFn($goalFirstG3ObjFnRow->fn_id);
                            $goalFirstG3ObjControlName = "txtgoalfirstg3obj" . $goalFirstG3Ctr;
                            $goalFirstG3FnControlName = "slctgoalfirstg3fn" . $goalFirstG3Ctr;
                            ?>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Obj</td>
                                <td>
                                    <input type="text" name="<?php echo $goalFirstG3ObjControlName;?>" id="<?php echo $goalFirstG3ObjControlName;?>" value="<?php echo $goalFirstG3ObjFnRow->obj;?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Fn</td>
                                <td>
                                    <select name="<?php echo $goalFirstG3FnControlName;?>" id="<?php echo $goalFirstG3FnControlName;?>" style="width:100%">
                                        <option value="">--Select--</option>
                                        <?php
                                            foreach ($fnIdArray as $fnId) {
                                                $fnObj = getFn($fnId);
                                                if($fnId === $goalFirstG3ObjFnRow->fn_id){
                                                    ?>
                                                        <option value="<?php echo $fnObj->id;?>" selected="selected"><?php echo $fnObj->fn_name;?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?php echo $fnObj->id;?>"><?php echo $fnObj->fn_name;?></option>
                                                    <?php
                                                }
                                            }//end foreach loop
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $goalFirstG3Ctr++;
                        }//end while loop
                    }//end if condition for goalFirstG1ObjFnList
                ?>
                <?php
            }//end empty checking for goalFirstG1List

            ?>
        </table>
    <table border="0" width="100%">
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        var thId = "<?php echo $thId;?>";
        //now create the button id here using the actionId i got...
        var buttonId = "updateGoalFirstButton" + thId;
        var goalFirstG1Ctr = "<?php echo $goalFirstG1Ctr;?>";
        var goalFirstG2Ctr = "<?php echo $goalFirstG2Ctr;?>";
        var goalFirstG3Ctr = "<?php echo $goalFirstG3Ctr;?>";
        goalFirstG1Ctr--;
        goalFirstG2Ctr--;
        goalFirstG3Ctr--;
        //alert(goalFirstG1Ctr+" "+goalFirstG2Ctr+" "+goalFirstG3Ctr);
        //Stopped coding here...
        $('#'+buttonId).click(function(){
            //get the counter values for each g1 g2 and g3 now define the control names...
            var goalFirstG1ObjControlName = null;
            var goalFirstG1FnControlName = null;
            var goalFirstG2ObjControlName = null;
            var goalFirstG2FnControlName = null;
            var goalFirstG3ObjControlName = null;
            var goalFirstG3FnControlName = null;
            //get the static control value here...
            var txtG1Val = $('#txtg1').val();
            var slctFn1Val = $('#slctfn1').val();
            var txtG2Val = $('#txtg2').val();
            var slctFn2Val = $('#slctfn2').val();
            var txtG3Val = $('#txtg3').val();
            var slctFn3Val = $('#slctfn3').val();
            //now grab the ids here
            var goalFirstG1Id = "<?php echo $goalFirstG1Id;?>";
            var goalFirstG1ObjFnId = "<?php echo $goalFirstG1ObjFnId;?>";
            var goalFirstG2Id = "<?php echo $goalFirstG2Id;?>";
            var goalFirstG2ObjFnId = "<?php echo $goalFirstG2ObjFnId;?>";
            var goalFirstG3Id = "<?php echo $goalFirstG3Id;?>";
            var goalFirstG3ObjFnId = "<?php echo $goalFirstG3ObjFnId;?>";
            var goalFirstId = "<?php echo $goalFirstId;?>";

            //var divId = "editActionTextDiv" + thActionId;
            var divId = "actionDiv" + thId;

            if(true){
                var dataString = "txtG1Val="+txtG1Val+
                "&slctFn1Val="+slctFn1Val+"&txtG2Val="+txtG2Val+"&slctFn2Val="+slctFn2Val+"&txtG3Val="+txtG3Val+
                "&slctFn3Val="+slctFn3Val+"&goalFirstG1Id="+goalFirstG1Id+"&goalFirstG1ObjFnId="+goalFirstG1ObjFnId+
                "&goalFirstG2Id="+goalFirstG2Id+"&goalFirstG2ObjFnId="+goalFirstG2ObjFnId+"&goalFirstG3Id="+goalFirstG3Id+
                "&goalFirstG3ObjFnId="+goalFirstG3ObjFnId+"&goalFirstG1Ctr="+goalFirstG1Ctr+"&goalFirstG2Ctr="+
                goalFirstG2Ctr+"&goalFirstG3Ctr="+goalFirstG3Ctr+"&goalFirstId="+goalFirstId;
                //now get the dynamic values and append it to the dataString variable.
                for(var i=1; i<=goalFirstG1Ctr; i++){
                    var goalFirstG1ObjControlName = "txtgoalfirstg1obj" + i;
                    var goalFirstG1FnControlName = "slctgoalfirstg1fn" + i;
                    var goalFirstG1ObjVal = $('#'+goalFirstG1ObjControlName).val();
                    var goalFirstG1FnVal = $('#'+goalFirstG1FnControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalFirstG1ObjControlName+"="+goalFirstG1ObjVal+"&"+goalFirstG1FnControlName+"="+
                        goalFirstG1FnVal;
                }

                for(var j=1; j<=goalFirstG2Ctr; j++){
                    var goalFirstG2ObjControlName = "txtgoalfirstg2obj" + j;
                    var goalFirstG2FnControlName = "slctgoalfirstg2fn" + j;
                    var goalFirstG2ObjVal = $('#'+goalFirstG2ObjControlName).val();
                    var goalFirstG2FnVal = $('#'+goalFirstG2FnControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalFirstG2ObjControlName+"="+goalFirstG2ObjVal+"&"+goalFirstG2FnControlName+"="+
                        goalFirstG2FnVal;
                }

                for(var k=1; k<=goalFirstG3Ctr; k++){
                    var goalFirstG3ObjControlName = "txtgoalfirstg3obj" + k;
                    var goalFirstG3FnControlName = "slctgoalfirstg3fn" + k;
                    var goalFirstG3ObjVal = $('#'+goalFirstG3ObjControlName).val();
                    var goalFirstG3FnVal = $('#'+goalFirstG3FnControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalFirstG3ObjControlName+"="+goalFirstG3ObjVal+"&"+goalFirstG3FnControlName+"="+
                        goalFirstG3FnVal;
                }


                $.ajax({
                    url: 'files/updategoalfirst.php',
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
