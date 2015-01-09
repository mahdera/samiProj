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
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $fnId = $_GET['fn_id'];
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    //echo $fnId;
    $buttonId = "updateGoalSecondButton" . $fnId;
    $goalSecondFnRow = null;

    if($userObj->user_level == '02'){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $goalSecondFnRow = getGoalSecondFnUsingFnIdAndDivision($fnId, $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        if(!empty($userObject)){
            $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
            $goalSecondFnRow = getGoalSecondFnUsingFnIdAndDivision($fnId, $userSubDistrictObj->sub_district_id);
        }
    }

    $goalSecondFnId = $goalSecondFnRow->id;
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
    $goalSecondG1ObjHiddenIdControlName=null;
    $goalSecondG2ObjHiddenIdControlName=null;
    $goalSecondG3ObjHiddenIdControlName=null;
?>
<form>
    <table border="0" width="100%" style="padding:5px" id="goalFirstG1ObjTable">
        <?php
            $goalSecondG1Row = getGoalSecondG1ForGoalSecondFnId($goalSecondFnId);
            if(!empty($goalSecondG1Row)){
                $goalSecondG1Id = $goalSecondG1Row->id;
            ?>
                <tr>
                    <td width="20%">G1</td>
                    <td>
                        <?php
                          $g1ControlName = "edittxtg1" . $fnId;
                        ?>
                        <textarea name="<?php echo $g1ControlName;?>" id="<?php echo $g1ControlName;?>" style="width:100%" rows="4" class="g1Obj"><?php echo $goalSecondG1Row->g1;?></textarea>
                    </td>
                </tr>
            <?php
                $goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Id);
                if(!empty($goalSecondG1ObjList)){
                    while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){
                        $goalSecondG1ObjControlName = "edittxtgoalsecondg1obj" . $fnId . $goalSecondG1Ctr;
                        $goalSecondG1ObjId = $goalSecondG1ObjRow->id;
                        $goalSecondG1ObjHiddenIdControlName = "hiddengoalsecondg1objid" . $fnId . $goalSecondG1Ctr;
                        ?>
                            <tr>
                                <td>Obj</td>
                                <td>
                                    <textarea name="<?php echo $goalSecondG1ObjControlName;?>" id="<?php echo $goalSecondG1ObjControlName;?>" style="width:100%" rows="4"><?php echo $goalSecondG1ObjRow->obj;?></textarea>
                                    <input type="hidden" name="<?php echo $goalSecondG1ObjHiddenIdControlName;?>" id="<?php echo $goalSecondG1ObjHiddenIdControlName;?>" value="<?php echo $goalSecondG1ObjId;?>"/>
                                </td>
                            </tr>
                        <?php
                        $goalSecondG1Ctr++;
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
        <tr id="addMoreG1Obj">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG1ObjLink">[Add More]</a> |
                <a href="#.php" id="removeG1ObjThRowLink">[Remove]</a>
            </td>
        </tr>
    </table>

    <table border="0" width="100%" style="padding:5px" id="goalFirstG2ObjTable">
        <?php
            $goalSecondG2Row = getGoalSecondG2ForGoalSecondFnId($goalSecondFnId);
            if(!empty($goalSecondG2Row)){
                $goalSecondG2Id = $goalSecondG2Row->id;
            ?>
                <tr>
                    <td width="20%">G2</td>
                    <td>
                        <?php
                          $g2ControlName = "edittxtg2" . $fnId;
                        ?>
                        <textarea name="<?php echo $g2ControlName;?>" id="<?php echo $g2ControlName;?>" style="width:100%" rows="4" class="g2Obj"><?php echo $goalSecondG2Row->g2;?></textarea>
                    </td>
                </tr>
            <?php
                $goalSecondG2ObjList = getAllGoalSecondG2ObjsForThisGoalSecondG2Id($goalSecondG2Id);
                if(!empty($goalSecondG2ObjList)){
                    while($goalSecondG2ObjRow = mysql_fetch_object($goalSecondG2ObjList)){
                        $goalSecondG2ObjControlName = "edittxtgoalsecondg2obj" . $fnId . $goalSecondG2Ctr;
                        $goalSecondG2ObjId = $goalSecondG2ObjRow->id;
                        $goalSecondG2ObjHiddenIdControlName = "hiddengoalsecondg2objid" . $fnId . $goalSecondG2Ctr;
                        ?>
                            <tr>
                                <td>Obj</td>
                                <td>
                                    <textarea name="<?php echo $goalSecondG2ObjControlName;?>" id="<?php echo $goalSecondG2ObjControlName;?>" style="width:100%" rows="4"><?php echo $goalSecondG2ObjRow->obj;?></textarea>
                                    <input type="hidden" name="<?php echo $goalSecondG2ObjHiddenIdControlName;?>" id="<?php echo $goalSecondG2ObjHiddenIdControlName;?>" value="<?php echo $goalSecondG2ObjId;?>"/>
                                </td>
                            </tr>
                        <?php
                        $goalSecondG2Ctr++;
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
        <tr id="addMoreG2Obj">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG2ObjLink">[Add More]</a> |
                <a href="#.php" id="removeG2ObjThRowLink">[Remove]</a>
            </td>
        </tr>
    </table>

    <table border="0" width="100%" style="padding:5px" id="goalFirstG3ObjTable">
        <?php
            $goalSecondG3Row = getGoalSecondG3ForGoalSecondFnId($goalSecondFnId);
            if(!empty($goalSecondG3Row)){
                $goalSecondG3Id = $goalSecondG3Row->id;
            ?>
                <tr>
                    <td width="20%">G3</td>
                    <td>
                        <?php
                          $g3ControlName = "edittxtg3" . $fnId;
                        ?>
                        <textarea name="<?php echo $g3ControlName;?>" id="<?php echo $g3ControlName;?>" style="width:100%" rows="4" class="g3Obj"><?php echo $goalSecondG3Row->g3;?></textarea>
                    </td>
                </tr>
            <?php
                $goalSecondG3ObjList = getAllGoalSecondG3ObjsForThisGoalSecondG3Id($goalSecondG3Id);
                if(!empty($goalSecondG3ObjList)){
                    while($goalSecondG3ObjRow = mysql_fetch_object($goalSecondG3ObjList)){
                        $goalSecondG3ObjControlName = "edittxtgoalsecondg3obj" . $fnId . $goalSecondG3Ctr;
                        $goalSecondG3ObjId = $goalSecondG3ObjRow->id;
                        $goalSecondG3ObjHiddenIdControlName = "hiddengoalsecondg3objid" . $fnId . $goalSecondG3Ctr;
                        ?>
                            <tr>
                                <td>Obj</td>
                                <td>
                                    <textarea name="<?php echo $goalSecondG3ObjControlName;?>" id="<?php echo $goalSecondG3ObjControlName;?>" style="width:100%" rows="4"><?php echo $goalSecondG3ObjRow->obj;?></textarea>
                                    <input type="hidden" name="<?php echo $goalSecondG3ObjHiddenIdControlName;?>" id="<?php echo $goalSecondG3ObjHiddenIdControlName;?>" value="<?php echo $goalSecondG3ObjId;?>"/>
                                </td>
                            </tr>
                        <?php
                        $goalSecondG3Ctr++;
                    }//end while loop
                }//end empty checking inner if condition
            }//end if empty checking condition
        ?>
        <tr id="addMoreG3Obj">
            <td colspan="2" align="right">
                <a href="#.php" id="addMoreG3ObjLink">[Add More]</a> |
                <a href="#.php" id="removeG3ObjThRowLink">[Remove]</a>
            </td>
        </tr>
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
        var fnId = "<?php echo $fnId;?>";
        //now create the button id here using the actionId i got...
        var buttonId = "updateGoalSecondButton" + fnId;
        var goalSecondG1Ctr = "<?php echo $goalSecondG1Ctr;?>";
        var goalSecondG2Ctr = "<?php echo $goalSecondG2Ctr;?>";
        var goalSecondG3Ctr = "<?php echo $goalSecondG3Ctr;?>";
        goalSecondG1Ctr--;
        goalSecondG2Ctr--;
        goalSecondG3Ctr--;

        $('#'+buttonId).click(function(){
            var divId = "goalSecondDetailDiv" + fnId;
            //get the counter values for each g1 g2 and g3 now define the control names...
            var goalSecondG1ObjControlName = null;
            var goalSecondG2ObjControlName = null;
            var goalSecondG3ObjControlName = null;
            //get the static control value here...
            var g1ControlName = "edittxtg1" + fnId;
            var g2ControlName = "edittxtg2" + fnId;
            var g3ControlName = "edittxtg3" + fnId;
            var txtG1Val = $('#' + g1ControlName).val();
            var txtG2Val = $('#' + g2ControlName).val();
            var txtG3Val = $('#' + g3ControlName).val();
            //now grab the ids here
            var goalSecondG1Id = "<?php echo $goalSecondG1Id;?>";
            var goalSecondG2Id = "<?php echo $goalSecondG2Id;?>";
            var goalSecondG3Id = "<?php echo $goalSecondG3Id;?>";
            var goalSecondFnId = "<?php echo $goalSecondFnId;?>";

            if(true){
                var dataString = "txtG1Val="+txtG1Val+"&fnId="+fnId+
                "&txtG2Val="+txtG2Val+"&txtG3Val="+txtG3Val+"&goalSecondG1Id="+goalSecondG1Id+
                "&goalSecondG2Id="+goalSecondG2Id+"&goalSecondG3Id="+goalSecondG3Id+"&goalSecondFnId="+goalSecondFnId+
                "&goalSecondG1Ctr="+goalSecondG1Ctr+"&goalSecondG2Ctr="+goalSecondG2Ctr+"&goalSecondG3Ctr="+goalSecondG3Ctr;

                //now get the dynamic values and append it to the dataString variable.
                for(var i=1; i<=goalSecondG1Ctr; i++){
                    var goalSecondG1ObjControlName = "edittxtgoalsecondg1obj" + fnId + i;
                    var goalSecondG1ObjHiddenIdControlName = "hiddengoalsecondg1objid" + fnId + i;
                    var goalSecondG1ObjVal = $('#'+goalSecondG1ObjControlName).val();
                    var goalSecondG1ObjHiddenIdVal = $('#'+goalSecondG1ObjHiddenIdControlName).val();

                    //append it to the dataString variable...
                    dataString += "&"+goalSecondG1ObjControlName+"="+goalSecondG1ObjVal+"&"+
                    goalSecondG1ObjHiddenIdControlName+"="+goalSecondG1ObjHiddenIdVal;
                }

                var howManyg1ObjAddedItems = $('.g1Obj').length;
                if(howManyg1ObjAddedItems != 0){
                    for(var i=2; i<=(howManyg1ObjAddedItems+1); i++){
                        var g1ObjControlName = "txtg1obj"+i;
                        //now get the values...
                        var g1ObjVal = $('#'+g1ObjControlName).val();
                        //now append the values to the dataString...
                        dataString += "&"+g1ObjControlName+"="+g1ObjVal+"&g1AddedItems="+
                        howManyg1ObjAddedItems;

                    }//end for loop
                }else{
                    dataString += "&g1AddedItems=0";
                }


                for(var j=1; j<=goalSecondG2Ctr; j++){
                    var goalSecondG2ObjControlName = "edittxtgoalsecondg2obj" + fnId + j;
                    var goalSecondG2ObjHiddenIdControlName = "hiddengoalsecondg2objid" + fnId + j;
                    var goalSecondG2ObjVal = $('#'+goalSecondG2ObjControlName).val();
                    var goalSecondG2ObjHiddenIdVal = $('#'+goalSecondG2ObjHiddenIdControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalSecondG2ObjControlName+"="+goalSecondG2ObjVal+"&"+
                    goalSecondG2ObjHiddenIdControlName+"="+goalSecondG2ObjHiddenIdVal;
                }

                var howManyg2ObjAddedItems = $('.g2Obj').length;
                if(howManyg2ObjAddedItems != 0){
                    for(var i=2; i<=(howManyg2ObjAddedItems+1); i++){
                        var g2ObjControlName = "txtg2obj"+i;
                        //now get the values...
                        var g2ObjVal = $('#'+g2ObjControlName).val();
                        //now append the values to the dataString...
                        dataString += "&"+g2ObjControlName+"="+g2ObjVal+"&g2AddedItems="+
                        howManyg2ObjAddedItems;

                    }//end for loop
                }else{
                    dataString += "&g2AddedItems=0";
                }

                for(var k=1; k<=goalSecondG3Ctr; k++){
                    var goalSecondG3ObjControlName = "edittxtgoalsecondg3obj" + fnId + k;
                    var goalSecondG3ObjHiddenIdControlName = "hiddengoalsecondg3objid" + fnId + k;
                    var goalSecondG3ObjVal = $('#'+goalSecondG3ObjControlName).val();
                    var goalSecondG3ObjHiddenIdVal = $('#'+goalSecondG3ObjHiddenIdControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalSecondG3ObjControlName+"="+goalSecondG3ObjVal+"&"+
                    goalSecondG3ObjHiddenIdControlName+"="+goalSecondG3ObjHiddenIdVal;
                }

                var howManyg3ObjAddedItems = $('.g3Obj').length;
                if(howManyg3ObjAddedItems != 0){
                    for(var i=2; i<=(howManyg3ObjAddedItems+1); i++){
                        var g3ObjControlName = "txtg3obj"+i;
                        //now get the values...
                        var g3ObjVal = $('#'+g3ObjControlName).val();
                        //now append the values to the dataString...
                        dataString += "&"+g3ObjControlName+"="+g3ObjVal+"&g3AddedItems="+
                        howManyg3ObjAddedItems;

                    }//end for loop
                }else{
                    dataString += "&g3AddedItems=0";
                }

                //var divId = "actionDiv" + fnId;
                //alert(divId);
                $.ajax({
                    url: 'files/updategoalsecond.php',
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

        ///the line below are added by Mahder in my own house....new features...
        $('#addMoreG1ObjLink').click(function(){
            var numItems = $('.g1Obj').length;
            var dataString = "numItems="+numItems;

            $.ajax({
                url: 'files/showmoreg1objform.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //var trId = "addMoreG1Obj";// + numItems;
                    //$('#' + trId).after(response);
                    $('#goalFirstG1ObjTable tr:last').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });

        });

        $('#addMoreG2ObjLink').click(function(){
            var numItems = $('.g2Obj').length;
            var dataString = "numItems="+numItems;

            $.ajax({
                url: 'files/showmoreg2objform.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //var trId = "addMoreG2Obj";// + numItems;
                    //$('#' + trId).after(response);
                    $('#goalFirstG2ObjTable tr:last').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });

        });

        $('#addMoreG3ObjLink').click(function(){
            var numItems = $('.g3Obj').length;
            var dataString = "numItems="+numItems;

            $.ajax({
                url: 'files/showmoreg3objform.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //var trId = "addMoreG3Obj";// + numItems;
                    //$('#' + trId).after(response);
                    $('#goalFirstG3ObjTable tr:last').after(response);
                },
                error:function(error){
                    alert(error);
                }
            });

        });

        $('#removeG1ObjThRowLink').click(function(){
            var numItems = $('.g1Obj').length;
            if(numItems > 1){
                var thRowId = 'addMoreG1Obj'+numItems;
                $('#'+thRowId).remove();
            }
        });

        $('#removeG2ObjThRowLink').click(function(){
            var numItems = $('.g2Obj').length;
            if(numItems > 1){
                var thRowId = 'addMoreG2Obj'+numItems;
                $('#'+thRowId).remove();
            }
        });

        $('#removeG3ObjThRowLink').click(function(){
            var numItems = $('.g3Obj').length;
            if(numItems > 1){
                var thRowId = 'addMoreG3Obj'+numItems;
                $('#'+thRowId).remove();
            }
        });
        /////end addition of new feature./////
    });//end document.ready fucntion
</script>
