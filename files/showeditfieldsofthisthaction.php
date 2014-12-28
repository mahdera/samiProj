<?php
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
    //now get the thActionId for this thId
    $thActionObj = getThActionForTh($thId);
    //////////
    @$countVal = 0;
    @$countVal = doesThisThAlreadyActionFilledForIt($thId);
    if($countVal != 0){
        //now get all goalfirst records associated with this particular thId
        $goalFirstThRow = getGoalFirstThUsingThId($thId);
        if(!empty($goalFirstThRow)){
            $goalFirstThId = $goalFirstThRow->id;
            //now get all goalfirstg1 records associated with this particualr goalfirstid
            ?>
            <table border="0" width="100%">
                <?php
                $goalFirstG1Row = getGoalFirstG1ForGoalFirstThId($goalFirstThId);

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
                $goalFirstG2Row = getGoalFirstG2ForGoalFirstThId($goalFirstThId);

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
                $goalFirstG3Row = getGoalFirstG3ForGoalFirstThId($goalFirstThId);

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
                        Th Action
                    </td>
                    <td style="padding-right:15px">
                        <?php
                            $thActionId = $thActionObj->id;
                            //now define the control names in here...
                            $thActionControlName = "textareathactionedit" . $thActionId;
                            $buttonId = "btnupdatethaction" . $thActionId;
                            $thActionObj = getThAction($thActionId);
                        ?>
                        <textarea name="<?php echo $thActionControlName;?>" id="<?php echo $thActionControlName;?>" rows="3" style="width:100%"><?php echo $thActionObj->action_text;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                    </td>
                </tr>
            </table>
            <?php
        }else{
            echo '<div class="notify notify-red"><span class="symbol icon-error"></span> No Associated Th Record Found!</div>';
        }
    }else{
        echo '<div class="notify notify-yellow"><span class="symbol icon-excl"></span> You Already Added Record!</div>';
    }
?>
<script type="text/javascript">
  $(document).ready(function(){
      var thActionId = "<?php echo $thActionId;?>";
      var buttonId = "btnupdatethaction" + thActionId;
      var thId = "<?php echo $thId;?>";

      $('#'+buttonId).click(function(){
        var thActionControlName = "textareathactionedit" + thActionId;
        var updatedText = $('#'+thActionControlName).val();
        if(updatedText !== ''){
          var dataString = "updatedText="+encodeURIComponent(updatedText)+"&thActionId="+thActionId;
          //var divId = "editThisThActionDiv" + thActionId;
          var divId = "actionDiv" + thId;
          $.ajax({
              url: 'files/updatethisthaction.php',
              data: dataString,
              type:'POST',
              success:function(response){
                  //$('#'+divId).html(response);
                  $('#innerDivToRefresh').load('putthactionmanagementform.php');
              },
              error:function(error){
                  alert(error);
              }
          });
        }
      });
  });//end document.ready function
</script>
