<?php
    session_start();
    $fnId = $_GET['fnId'];
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

    //now get the fnAction object for this fnId
    $fnActionObj = null;//getFnActionForFn($fnId);
    $fnActionId = null;
    $fnEditActionText = "fnEditActionText" . $fnId;
    $buttonId = "updateFnActionButton" . $fnId;
    $goalSecondFnRow = null;//getGoalSecondFnUsingFnId($fnId);

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    //echo $fnId;
    $buttonId = "updateGoalSecondButton" . $fnId;
    $goalSecondFnRow = null;

    if($userObj->user_level == '02'){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $goalSecondFnRow = getGoalSecondFnUsingFnIdAndDivision($fnId, $userSubDistrictObj->sub_district_id);
        $fnActionObj = getFnActionUsingDivision($fnId, $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        if(!empty($userObject)){
            $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
            $goalSecondFnRow = getGoalSecondFnUsingFnIdAndDivision($fnId, $userSubDistrictObj->sub_district_id);
            $fnActionObj = getFnActionUsingDivision($fnId, $userSubDistrictObj->sub_district_id);
        }
    }

    $goalSecondFnId = $goalSecondFnRow->id;
    $fnObj = getFn($fnId);
    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUser($_SESSION['LOGGED_USER_ID']);
    //now I got all the result set read from the database...lets do the iteration thing now...
    $fn = getFn($fnId);
    $countVal=0;
    @$countVal = doesThisFnAlreadyActionFilledForIt($fnId);

    if($countVal != 0){
        ?>
        <form>
            <table border="0" width="100%">
                <?php
                $goalSecondG1Row = getGoalSecondG1ForGoalSecondFnId($goalSecondFnId);
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
                $goalSecondG2Row = getGoalSecondG2ForGoalSecondFnId($goalSecondFnId);
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
                $goalSecondG3Row = getGoalSecondG3ForGoalSecondFnId($goalSecondFnId);
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
                    <td>Fn Action</td>
                    <td style="padding-left:10px;padding-right:15px">
                        <?php
                            //var_dump($fnActionObj);
                            $fnActionId = $fnActionObj->id;
                            //now define the control names in here...
                            $fnActionControlName = "textareafnactionedit" . $fnActionId;
                            $buttonId = "btnupdatefnaction" . $fnActionId;
                            //$fnActionObj = null;

                            /*if($userObj->user_level == '02'){
                                $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                $fnActionObj = getFnActionUsingDivision($fnActionId, $userSubDistrictObj->sub_district_id);
                            }else if($userObj->user_level == '01'){
                                $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                                if(!empty($userObject)){
                                    $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
                                    $fnActionObj = getFnActionUsingDivision($fnActionId, $userSubDistrictObj->sub_district_id);
                                }
                            }*/
                        ?>
                        <textarea name="<?php echo $fnActionControlName;?>" id="<?php echo $fnActionControlName;?>" rows="3" style="width:100%"><?php echo $fnActionObj->action_text;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
    }else{
        echo '<div class="notify notify-yellow"><span class="symbol icon-excl"></span> You Already Added Record!</div>';
    }
?>
<script type="text/javascript">
  $(document).ready(function(){
      var fnActionId = "<?php echo $fnActionId;?>";
      var buttonId = "btnupdatefnaction" + fnActionId;
      var fnId = "<?php echo $fnId;?>";
      $('#'+buttonId).click(function(){
        var fnActionControlName = "textareafnactionedit" + fnActionId;
        var updatedText = $('#'+fnActionControlName).val();
        if(updatedText !== ''){
          var dataString = "updatedText="+encodeURIComponent(updatedText)+"&fnActionId="+fnActionId;
          var divId = "actionDiv" + fnId;
          $.ajax({
              url: 'files/updatethisfnaction.php',
              data: dataString,
              type:'POST',
              success:function(response){
                $('#innerDivToRefresh').load('putfnactionmanagementform.php');
                  //$('#'+divId).html(response);
              },
              error:function(error){
                  alert(error);
              }
          });
        }
      });
  });//end document.ready function
</script>
