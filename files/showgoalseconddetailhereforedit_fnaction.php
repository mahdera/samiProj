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

$userObj = getUser($_SESSION['LOGGED_USER_ID']);

$fnId = $_GET['fn_id'];
//echo $fnId;
$buttonId = "updateGoalSecondButton" . $fnId;
$goalSecondFnRow = null;//getGoalSecondFnUsingFnId($fnId);
$divisionId = null;

if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $divisionId = $userSubDistrictObj->sub_district_id;
    $goalSecondFnRow = getGoalSecondFnUsingFnIdAndDivision($fnId, $divisionId);
}else if($userObj->user_level == '01'){
    $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObject)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
        $divisionId = $userSubDistrictObj->sub_district_id;
        $goalSecondFnRow = getGoalSecondFnUsingFnIdAndDivision($fnId, $divisionId);
    }
}

$goalSecondFnId = $goalSecondFnRow->id;
$goalSecondId = $goalSecondFnRow->goal_second_id;
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
$fnActionControlName = "textareafnaction" . $fnId;
?>
<form>
    <table border="0" width="100%" style="padding:5px">
        <?php
        $goalSecondG1Row = getGoalSecondG1ForGoalSecondFnId($goalSecondFnId);
        if(!empty($goalSecondG1Row)){
            $goalSecondG1Id = $goalSecondG1Row->id;
            ?>
            <tr>
                <td width="1%"></td>
                <td width="10%">G1</td>
                <td>
                    <?php
                    $g1ControlName = "edittxtg1" . $fnId;
                    ?>
                    <!--<input type="text" name="<?php //echo $g1ControlName;?>" id="<?php //echo $g1ControlName;?>" value="<?php //echo $goalSecondG1Row->g1;?>" size="70"/>-->
                    <textarea name="<?php echo $g1ControlName;?>" id="<?php echo $g1ControlName;?>" style="width:100%" rows="4"><?php echo $goalSecondG1Row->g1;?></textarea>
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
                        <td></td>
                        <td>Obj</td>
                        <td>
                            <!--<input type="text" name="" id="" value="" size="70"/>-->
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
    </table>

    <table border="0" width="100%" style="padding:5px">
        <?php
        $goalSecondG2Row = getGoalSecondG2ForGoalSecondFnId($goalSecondFnId);
        if(!empty($goalSecondG2Row)){
            $goalSecondG2Id = $goalSecondG2Row->id;
            ?>
            <tr>
                <td width="1%"></td>
                <td width="10%">G2</td>
                <td>
                    <?php
                    $g2ControlName = "edittxtg2" . $fnId;
                    ?>
                    <!--<input type="text" name="" id="" value="" size="70"/>-->
                    <textarea name="<?php echo $g2ControlName;?>" id="<?php echo $g2ControlName;?>" style="width:100%" rows="4"><?php echo $goalSecondG2Row->g2;?></textarea>
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
                        <td></td>
                        <td>Obj</td>
                        <td>
                            <!--<input type="text" name="" id="" value="" size="70"/>-->
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
    </table>

    <table border="0" width="100%" style="padding:5px">
        <?php
        $goalSecondG3Row = getGoalSecondG3ForGoalSecondFnId($goalSecondFnId);
        if(!empty($goalSecondG3Row)){
            $goalSecondG3Id = $goalSecondG3Row->id;
            ?>
            <tr>
                <td width="1%"></td>
                <td width="10%">G3</td>
                <td>
                    <?php
                    $g3ControlName = "edittxtg3" . $fnId;
                    ?>
                    <!--<input type="text" name="" id="" value="" size="70"/>-->
                    <textarea name="<?php echo $g3ControlName;?>" id="<?php echo $g3ControlName;?>" style="width:100%" rows="4"><?php echo $goalSecondG3Row->g3;?></textarea>
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
                        <td></td>
                        <td>Obj</td>
                        <td>
                            <!--<input type="text" name="" id="" value="" size="70"/>-->
                            <textarea name="<?php echo $goalSecondG3ObjControlName;?>" id="<?php echo $goalSecondG3ObjControlName;?>" style="width:100%" rows="4"><?php echo $goalSecondG3ObjRow->obj;?></textarea>
                            <input type="hidden" name="<?php echo $goalSecondG3ObjHiddenIdControlName;?>" id="<?php echo $goalSecondG3ObjHiddenIdControlName;?>" value="<?php echo $goalSecondG3ObjId;?>"/>
                        </td>
                    </tr>
                    <?php
                    $goalSecondG3Ctr++;
                }//end while loop
            }//end empty checking inner if condition
        }//end if empty checking condition

        if( doesThisFnAlreadyActionFilledForItUsingDivision($fnId, $goalSecondId, $divisionId) ){
            $fnAction = getFnActionForFnUsingDivision($fnId, $goalSecondId, $divisionId);
            ?>
            <tr>
                <td></td>
                <td>Fn Action:</td>
                <td>
                    <textarea name="<?php echo $fnActionControlName;?>" id="<?php echo $fnActionControlName;?>" style="width:100%" rows="4"><?php echo $fnAction->action_text;?></textarea>
                </td>
            </tr>
            <?php
        }
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
        var fnId = "<?php echo $fnId;?>";
        var fnActionControlName = "textareafnaction" + fnId;
        //now create the button id here using the actionId i got...
        var buttonId = "updateGoalSecondButton" + fnId;
        var goalSecondG1Ctr = "<?php echo $goalSecondG1Ctr;?>";
        var goalSecondG2Ctr = "<?php echo $goalSecondG2Ctr;?>";
        var goalSecondG3Ctr = "<?php echo $goalSecondG3Ctr;?>";
        goalSecondG1Ctr--;
        goalSecondG2Ctr--;
        goalSecondG3Ctr--;

        $('#'+buttonId).click(function(){
            //var divId = "goalSecondDetailDiv" + fnId;
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

                if( $('#'+fnActionControlName).length ){
                    dataString += "&"+fnActionControlName+"="+$('#'+fnActionControlName).val();
                }else{
                    dataString += "&"+fnActionControlName+"="+null;
                }

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

                for(var j=1; j<=goalSecondG2Ctr; j++){
                    var goalSecondG2ObjControlName = "edittxtgoalsecondg2obj" + fnId + j;
                    var goalSecondG2ObjHiddenIdControlName = "hiddengoalsecondg2objid" + fnId + j;
                    var goalSecondG2ObjVal = $('#'+goalSecondG2ObjControlName).val();
                    var goalSecondG2ObjHiddenIdVal = $('#'+goalSecondG2ObjHiddenIdControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalSecondG2ObjControlName+"="+goalSecondG2ObjVal+"&"+
                    goalSecondG2ObjHiddenIdControlName+"="+goalSecondG2ObjHiddenIdVal;
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

                var divId = "actionDiv" + fnId;

                dataString += "&g1AddedItems=0&g2AddedItems=0&g3AddedItems=0";

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
    });//end document.ready fucntion
</script>
