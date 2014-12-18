<?php
    session_start();
    require_once 'fn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    require_once 'userdistrict.php';
    $fnList = null;
    //$fnList = getAllFnsModifiedByThisUser($_SESSION['LOGGED_USER_ID']);
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    if($userObj->user_level == '02'){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      if(!empty($userObj)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
      }
    }

    $numItems = $_POST['numItems'];
    //now define the control names in here...
    $objControlName = "txtg1obj" . ($numItems + 1);
    $fnSelectControlName = "slctg1fn" . ($numItems + 1);
    $trRowId = "addMoreG1ObjFn" . ($numItems + 1);
    $fnOtherDivId = "fnOtherG1ObjFn" . ($numItems + 1);
    $idForSpinner = "g1fn" . ($numItems + 1);
?>
<tr id="<?php echo $trRowId;?>" class="added">
    <td colspan="2">
        <table border="0" width="100%" style="background: #fff; border-line: 0px solid red">
            <tr style="background: red">
                <td  width="20%">Obj:</td>
                <td>
                    <!--<input type="text" id="<?php echo $objControlName;?>" name="<?php /*echo $objControlName;*/?>" class="g1Obj" size="70"/>-->
                    <textarea name="<?php echo $objControlName;?>" id="<?php echo $objControlName;?>" class="g1Obj" style="width:100%" rows="4"></textarea>
                </td>
            </tr>
            <tr style="background: red">
                <td width="20%">Fn:</td>
                <td>
                    <select name="<?php echo $fnSelectControlName;?>" id="<?php echo $fnSelectControlName;?>" style="width: 95%" onchange="showOtherFnDataEntryForm(this.value, '<?php echo $fnOtherDivId;?>', <?php echo $numItems + 1;?>);">
                        <option value="" selected="selected">--Select--</option>
                        <?php
                            while($fnRow = mysql_fetch_object($fnList)){
                                ?>
                                    <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                <?php
                            }//end while loop
                            ?>
                            <option value="other">other</option>
                    </select>
                    <a href="#.php" class="fnRefreshSpin" title="Refresh Fn list" id="<?php echo $idForSpinner;?>"><img src="images/spin.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr style="background: red">
                <td colspan="2">
                    <div id="<?php echo $fnOtherDivId;?>"></div>
                </td>
            </tr>
        </table>
    </td>
</tr>
<script type="text/javascript">
    function showOtherFnDataEntryForm(val, divId, uniqueVal){
        if(val === 'other'){
            //now insert the fn data entry form here...
            $('#'+divId).load('files/showotherfnentryformforuniqueval.php?uniqueVal='+uniqueVal);
        }else{
            $('#'+divId).html('');
        }
    }

    $(document).ready(function(){
        $('.fnRefreshSpin').click(function(){
            var idVal = $(this).attr('id');
            var selectControlName = "slct" + idVal;
            //first clear the current contents...
            jQuery('#'+selectControlName).children().remove();
            //now you have the control name defined in here, reload the content again...
            $.getJSON('files/reloadfunctionselectcontrolwithlatestdata.php', function(data) {
                console.log("succ");
            })

            .done(function( data ) {
                  $.each( data.functions, function( i, item ) {
                      //console.log(item.fnName);
                      jQuery('#'+selectControlName).append("<option value='"+item.fnId+"'>"+item.fnName+"</option>");
                  });
                  jQuery('#'+selectControlName).append("<option value='other'>other</option>");
            });
        });
    });//end document.ready function
</script>
