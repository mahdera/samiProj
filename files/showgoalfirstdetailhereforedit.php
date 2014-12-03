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
    require_once 'goalfirstth.php';
    require_once 'usersubdistrict.php';
    require_once 'user.php';

    $buttonId = "updateGoalFirstButton" . $thId;
    $thObj = getTh($thId);
    $goalFirstThRow = getGoalFirstFromGoalFirstThUsingThId($thId);
    //$goalFirstRow = getGoalFirstUsingThId($thId);
    $goalFirstThId = $goalFirstThRow->id;
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
    $goalFirstG1ObjHiddenIdControlName=null;
    $goalFirstG2ObjHiddenIdControlName=null;
    $goalFirstG3ObjHiddenIdControlName=null;
    $goalFirstG1Id;
    $goalFirstG1ObjFnId;
    $goalFirstG2Id;
    $goalFirstG2ObjFnId;
    $goalFirstG3Id;
    $goalFirstG3ObjFnId;
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
?>
<form>
    <table border="0" width="100%">
            <?php
            $goalFirstG1Row = getGoalFirstG1ForGoalFirstThId($goalFirstThRow->id);
            $goalFirstG1Id = $goalFirstG1Row->id;


            if(!empty($goalFirstG1Row)){
                ?>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">G1</td>
                    <td>
                        <?php
                          $g1ControlName = "edittxtg1" . $thId;
                        ?>
                        <textarea name="<?php echo $g1ControlName;?>" id="<?php echo $g1ControlName;?>" style="width:100%" rows="4"><?php echo $goalFirstG1Row->g1;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">Fn</td>
                    <td>
                        <?php
                          $fn1ControlName = "editslctfn1" . $thId;
                          //$fnList = getAllFunctionsEnteredByThisUser($_SESSION['LOGGED_USER_ID']);
                          if($userObj->user_level == '02'){
                            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                            $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                          }else if($userObj->user_level == '01'){
                            $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                            $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                          }
                        ?>
                        <select name="<?php echo $fn1ControlName;?>" id="<?php echo $fn1ControlName;?>" style="width:100%">
                            <option value="" selected="selected">--Option--</option>
                            <?php
                                while($fnRow = mysql_fetch_object($fnList)){
                                    if($goalFirstG1Row->fn_id == $fnRow->id){
                                    ?>
                                        <option value="<?php echo $fnRow->id;?>" selected="selected"><?php echo $fnRow->fn_name;?></option>
                                    <?php
                                    }else{
                                    ?>
                                        <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                    <?php
                                    }
                                }//end while loop
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
                            $goalFirstG1ObjControlName = "edittxtgoalfirstg1obj" . $thId . $goalFirstG1Ctr;
                            $goalFirstG1FnControlName = "editslctgoalfirstg1fn" . $thId . $goalFirstG1Ctr;
                            $goalFirstG1ObjHiddenIdControlName = "hiddengoalfirstg1objid" . $thId . $goalFirstG1Ctr;
                            ?>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Obj</td>
                                <td>
                                    <!--<input type="text" name="<?php //echo $goalFirstG1ObjControlName;?>" id="<?php //echo $goalFirstG1ObjControlName;?>" value="<?php //echo $goalFirstG1ObjFnRow->obj;?>" size="70"/>-->
                                    <textarea name="<?php echo $goalFirstG1ObjControlName;?>" id="<?php echo $goalFirstG1ObjControlName;?>" style="width:100%" rows="4"><?php echo $goalFirstG1ObjFnRow->obj;?></textarea>
                                    <input type="hidden" name="<?php echo $goalFirstG1ObjHiddenIdControlName;?>" id="<?php echo $goalFirstG1ObjHiddenIdControlName;?>" value="<?php echo $goalFirstG1ObjFnId;?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Fn</td>
                                <td>
                                    <select name="<?php echo $goalFirstG1FnControlName;?>" id="<?php echo $goalFirstG1FnControlName;?>" style="width:100%">
                                        <option value="">--Select--</option>
                                        <?php
                                            if($userObj->user_level == '02'){
                                              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                            }else if($userObj->user_level == '01'){
                                              $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                                              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                            }
                                            while ($fnRow = mysql_fetch_object($fnList)) {
                                                if($fnRow->id == $goalFirstG1ObjFnRow->fn_id){
                                                    ?>
                                                        <option value="<?php echo $fnRow->id;?>" selected="selected"><?php echo $fnRow->fn_name;?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
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
            $goalFirstG2Row = getGoalFirstG2ForGoalFirstThId($goalFirstThRow->id);
            //$goalFirstG2Row = getGoalFirstG2ForGoalFirst($goalFirstRow->id);

            if(!empty($goalFirstG2Row)){
                //$fn_row = getFn($goalFirstG2Row->fn_id);
                $goalFirstG2Id = $goalFirstG2Row->id;
                ?>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">G2</td>
                    <td>
                        <?php
                          $g2ControlName = "edittxtg2" . $thId;
                        ?>
                        <!--<input type="text" name="<?php //echo $g2ControlName;?>" id="<?php //echo $g2ControlName;?>" value="<?php //echo $goalFirstG2Row->g2;?>" size="70"/>-->
                        <textarea name="<?php echo $g2ControlName;?>" id="<?php echo $g2ControlName;?>" style="width:100%" rows="4"><?php echo $goalFirstG2Row->g2;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">Fn</td>
                    <td>
                        <?php
                          $fn2ControlName = "editslctfn2" . $thId;
                        ?>
                        <select name="<?php echo $fn2ControlName;?>" id="<?php echo $fn2ControlName;?>" style="width:100%">
                            <option value="">--Select--</option>
                            <?php
                                //$fnList = getAllFunctionsEnteredByThisUser($_SESSION['LOGGED_USER_ID']);
                                if($userObj->user_level == '02'){
                                  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                  $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                }else if($userObj->user_level == '01'){
                                  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                                  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                  $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                }
                                while ($fnRow = mysql_fetch_object($fnList)) {
                                    if($fnRow->id == $goalFirstG2Row->fn_id){
                                        ?>
                                            <option value="<?php echo $fnRow->id;?>" selected="selected"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }else{
                                        ?>
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }
                                }//end while loop
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
                            $goalFirstG2ObjControlName = "edittxtgoalfirstg2obj" . $thId . $goalFirstG2Ctr;
                            $goalFirstG2FnControlName = "editslctgoalfirstg2fn" . $thId . $goalFirstG2Ctr;
                            $goalFirstG2ObjHiddenIdControlName = "hiddengoalfirstg2objid" . $thId . $goalFirstG2Ctr;
                            ?>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Obj</td>
                                <td>
                                    <!--<input type="text" name="<?php //echo $goalFirstG2ObjControlName;?>" id="<?php //echo $goalFirstG2ObjControlName;?>" value="<?php //echo $goalFirstG2ObjFnRow->obj;?>" size="70"/>-->
                                    <textarea name="<?php echo $goalFirstG2ObjControlName;?>" id="<?php echo $goalFirstG2ObjControlName;?>" style="width:100%" rows="4"><?php echo $goalFirstG2ObjFnRow->obj;?></textarea>
                                    <input type="hidden" name="<?php echo $goalFirstG2ObjHiddenIdControlName;?>" id="<?php echo $goalFirstG2ObjHiddenIdControlName;?>" value="<?php echo $goalFirstG2ObjFnId;?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Fn</td>
                                <td>
                                    <select name="<?php echo $goalFirstG2FnControlName;?>" id="<?php echo $goalFirstG2FnControlName;?>" style="width:100%">
                                    <option value="">--Select--</option>
                                    <?php
                                        //$fnList = getAllFunctionsEnteredByThisUser($_SESSION['LOGGED_USER_ID']);
                                        if($userObj->user_level == '02'){
                                          $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                          $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                        }else if($userObj->user_level == '01'){
                                          $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                                          $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                          $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                        }
                                        while ($fnRow = mysql_fetch_object($fnList)) {
                                            if($fnRow->id == $goalFirstG2ObjFnRow->fn_id){
                                                ?>
                                                    <option value="<?php echo $fnRow->id;?>" selected="selected"><?php echo $fnRow->fn_name;?></option>
                                                <?php
                                            }else{
                                                ?>
                                                    <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                                <?php
                                            }
                                        }//end while loop
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
            $goalFirstG3Row = getGoalFirstG3ForGoalFirstThId($goalFirstThRow->id);
            //$goalFirstG3Row = getGoalFirstG3ForGoalFirst($goalFirstRow->id);

            if(!empty($goalFirstG3Row)){
                $goalFirstG3Id = $goalFirstG3Row->id;
                //$fn_row = getFn($goalFirstG3Row->fn_id);
                ?>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">G3</td>
                    <td>
                        <?php
                          $g3ControlName = "edittxtg3" . $thId;
                        ?>
                        <!--<input type="text" name="<?php //echo $g3ControlName;?>" id="<?php //echo $g3ControlName;?>" value="<?php echo $goalFirstG3Row->g3;?>" size="70"/>-->
                        <textarea name="<?php echo $g3ControlName;?>" id="<?php echo $g3ControlName;?>" style="width:100%" rows="4"><?php echo $goalFirstG3Row->g3;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">Fn</td>
                    <td>
                        <?php
                          $fn3ControlName = "editslctfn3" . $thId;
                        ?>
                        <select name="<?php echo $fn3ControlName;?>" id="<?php echo $fn3ControlName;?>" style="width:100%">
                            <option value="">--Select--</option>
                            <?php
                                //$fnList = getAllFunctionsEnteredByThisUser($_SESSION['LOGGED_USER_ID']);
                                if($userObj->user_level == '02'){
                                  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                  $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                }else if($userObj->user_level == '01'){
                                  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                                  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                  $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                }
                                while ($fnRow = mysql_fetch_object($fnList)) {
                                    if($fnRow->id === $goalFirstG3Row->fn_id){
                                        ?>
                                            <option value="<?php echo $fnRow->id;?>" selected="selected"><?php echo $fnRow->fn_name;?></option>
                                        <?php
                                    }else{
                                        ?>
                                            <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
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
                            $goalFirstG3ObjControlName = "edittxtgoalfirstg3obj" . $thId . $goalFirstG3Ctr;
                            $goalFirstG3FnControlName = "editslctgoalfirstg3fn" . $thId . $goalFirstG3Ctr;
                            $goalFirstG3ObjHiddenIdControlName = "hiddengoalfirstg3objid" . $thId . $goalFirstG3Ctr;
                            ?>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Obj</td>
                                <td>
                                    <!--<input type="text" name="<?php echo $goalFirstG3ObjControlName;?>" id="<?php //echo $goalFirstG3ObjControlName;?>" value="<?php //echo $goalFirstG3ObjFnRow->obj;?>" size="70"/>-->
                                    <textarea name="<?php echo $goalFirstG3ObjControlName;?>" id="<?php echo $goalFirstG3ObjControlName;?>" style="width:100%" rows="4"><?php echo $goalFirstG3ObjFnRow->obj;?></textarea>
                                    <input type="hidden" name="<?php echo $goalFirstG3ObjHiddenIdControlName;?>" id="<?php echo $goalFirstG3ObjHiddenIdControlName;?>" value="<?php echo $goalFirstG3ObjFnId;?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td width="5%">Fn</td>
                                <td>
                                    <select name="<?php echo $goalFirstG3FnControlName;?>" id="<?php echo $goalFirstG3FnControlName;?>" style="width:100%">
                                        <option value="">--Select--</option>
                                        <?php
                                            //$fnList = getAllFunctionsEnteredByThisUser($_SESSION['LOGGED_USER_ID']);
                                            if($userObj->user_level == '02'){
                                              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                            }else if($userObj->user_level == '01'){
                                              $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                                              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                              $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                                            }
                                            while ($fnRow = mysql_fetch_object($fnList)) {
                                                if($fnRow->id === $goalFirstG3ObjFnRow->fn_id){
                                                    ?>
                                                        <option value="<?php echo $fnRow->id;?>" selected="selected"><?php echo $fnRow->fn_name;?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
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
            var goalFirstG1ObjHiddenIdControlName = null;
            var goalFirstG1FnControlName = null;
            var goalFirstG2ObjControlName = null;
            var goalFirstG2FnControlName = null;
            var goalFirstG3ObjControlName = null;
            var goalFirstG3FnControlName = null;
            //get the static control value here...
            var g1ControlName = "edittxtg1" + thId;
            var g2ControlName = "edittxtg2" + thId;
            var g3ControlName = "edittxtg3" + thId;
            var fn1ControlName = "editslctfn1" + thId;
            var fn2ControlName = "editslctfn2" + thId;
            var fn3ControlName = "editslctfn3" + thId;
            var txtG1Val = $('#' + g1ControlName).val();
            var slctFn1Val = $('#' + fn1ControlName).val();
            var txtG2Val = $('#' + g2ControlName).val();
            var slctFn2Val = $('#' + fn2ControlName).val();
            var txtG3Val = $('#' + g3ControlName).val();
            var slctFn3Val = $('#' + fn3ControlName).val();
            //now grab the ids here
            var goalFirstG1Id = "<?php echo $goalFirstG1Id;?>";
            var goalFirstG2Id = "<?php echo $goalFirstG2Id;?>";
            var goalFirstG3Id = "<?php echo $goalFirstG3Id;?>";
            var goalFirstThId = "<?php echo $goalFirstThId;?>";

            //var divId = "editActionTextDiv" + thActionId;
            var divId = "actionDiv" + thId;

            if(true){
                var dataString = "txtG1Val="+txtG1Val+"&thId="+thId+
                "&slctFn1Val="+slctFn1Val+"&txtG2Val="+txtG2Val+"&slctFn2Val="+slctFn2Val+"&txtG3Val="+txtG3Val+
                "&slctFn3Val="+slctFn3Val+"&goalFirstG1Id="+goalFirstG1Id+"&goalFirstG2Id="+goalFirstG2Id+"&goalFirstG3Id="+goalFirstG3Id+
                "&goalFirstG1Ctr="+goalFirstG1Ctr+"&goalFirstG2Ctr="+
                goalFirstG2Ctr+"&goalFirstG3Ctr="+goalFirstG3Ctr+"&goalFirstThId="+goalFirstThId;
                //now get the dynamic values and append it to the dataString variable.
                for(var i=1; i<=goalFirstG1Ctr; i++){
                    var goalFirstG1ObjControlName = "edittxtgoalfirstg1obj" + thId + i;
                    var goalFirstG1FnControlName = "editslctgoalfirstg1fn" + thId + i;
                    var goalFirstG1ObjHiddenIdControlName = "hiddengoalfirstg1objid" + thId + i;
                    var goalFirstG1ObjVal = $('#'+goalFirstG1ObjControlName).val();
                    var goalFirstG1FnVal = $('#'+goalFirstG1FnControlName).val();
                    var goalFirstG1ObjHiddenIdVal = $('#'+goalFirstG1ObjHiddenIdControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalFirstG1ObjControlName+"="+goalFirstG1ObjVal+"&"+goalFirstG1FnControlName+"="+
                        goalFirstG1FnVal+"&"+goalFirstG1ObjHiddenIdControlName+"="+goalFirstG1ObjHiddenIdVal;
                }

                for(var j=1; j<=goalFirstG2Ctr; j++){
                    var goalFirstG2ObjControlName = "edittxtgoalfirstg2obj" + thId + j;
                    var goalFirstG2FnControlName = "editslctgoalfirstg2fn" + thId + j;
                    var goalFirstG2ObjHiddenIdControlName = "hiddengoalfirstg2objid" + thId + j;
                    var goalFirstG2ObjVal = $('#'+goalFirstG2ObjControlName).val();
                    var goalFirstG2FnVal = $('#'+goalFirstG2FnControlName).val();
                    var goalFirstG2ObjHiddenIdVal = $('#'+goalFirstG2ObjHiddenIdControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalFirstG2ObjControlName+"="+goalFirstG2ObjVal+"&"+goalFirstG2FnControlName+"="+
                        goalFirstG2FnVal+"&"+goalFirstG2ObjHiddenIdControlName+"="+goalFirstG2ObjHiddenIdVal;
                }

                for(var k=1; k<=goalFirstG3Ctr; k++){
                    var goalFirstG3ObjControlName = "edittxtgoalfirstg3obj" + thId + k;
                    var goalFirstG3FnControlName = "editslctgoalfirstg3fn" + thId + k;
                    var goalFirstG3ObjHiddenIdControlName = "hiddengoalfirstg3objid" + thId + k;
                    var goalFirstG3ObjVal = $('#'+goalFirstG3ObjControlName).val();
                    var goalFirstG3FnVal = $('#'+goalFirstG3FnControlName).val();
                    var goalFirstG3ObjHiddenIdVal = $('#'+goalFirstG3ObjHiddenIdControlName).val();
                    //append it to the dataString variable...
                    dataString += "&"+goalFirstG3ObjControlName+"="+goalFirstG3ObjVal+"&"+goalFirstG3FnControlName+"="+
                        goalFirstG3FnVal+"&"+goalFirstG3ObjHiddenIdControlName+"="+goalFirstG3ObjHiddenIdVal;
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
