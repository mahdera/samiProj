<?php
    session_start();
    require_once 'fn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    require_once 'userdistrict.php';
    $fnList = null;
    $fnList = getAllFnsModifiedByThisUser($_SESSION['LOGGED_USER_ID']);
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    /*if($userObj->user_level == 'Zone Level'){
        $userZoneObj = getZoneInfoForUser($userObj->id);
        $fnList = getAllFnsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
    }else if($userObj->user_level == 'Branch Level'){
        $userBranchObj = getBranchInfoForUser($userObj->id);
        $fnList = getAllFnsModifiedByUsingUserLevel('Branch Level', $userBranchObj->branch_id);
    }*/
    $numItems = $_POST['numItems'];
    //now define the control names in here...
    $objControlName = "txtg1obj" . ($numItems + 1);
    $fnSelectControlName = "slctg1fn" . ($numItems + 1);
    $trRowId = "addMoreG1ObjFn" . ($numItems + 1);
    $fnOtherDivId = "fnOtherG1ObjFn" . ($numItems + 1);
?>
<tr id="<?php echo $trRowId;?>">
    <td colspan="2">
        <table border="0" width="100%" style="background: lightyellow">
            <tr>
                <td  width="20%">Obj:</td>
                <td>
                    <input type="text" id="<?php echo $objControlName;?>" name="<?php echo $objControlName;?>" class="g1Obj" size="70"/>
                </td>
            </tr>
            <tr>
                <td width="20%">Fn:</td>
                <td>
                    <select name="<?php echo $fnSelectControlName;?>" id="<?php echo $fnSelectControlName;?>" style="width: 100%" onchange="showOtherFnDataEntryForm(this.value, '<?php echo $fnOtherDivId;?>', <?php echo $numItems + 1;?>);">
                        <option value="" selected="selected">--Select--</option>
                        <option value="Fnc1">Fnc1</option>
                        <option value="Fnc2">Fnc2</option>
                        <option value="Fnc3">Fnc3</option>
                        <option value="Fnc4">Fnc4</option>
                        <option value="Fnc5">Fnc5</option>
                        <option value="Fnc6">Fnc6</option>
                        <option value="Fnc7">Fnc7</option>
                        <option value="Fnc8">Fnc8</option>
                        <option value="Fnc9">Fnc9</option>
                        <option value="Fnc10">Fnc10</option>
                        <?php
                            while($fnRow = mysql_fetch_object($fnList)){
                                ?>
                                    <option value="<?php echo $fnRow->id;?>"><?php echo $fnRow->fn_name;?></option>
                                <?php
                            }//end while loop
                            ?>
                            <option value="other">other</option>
                    </select>
                </td>
            </tr>
            <tr>
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
        }
    }
</script>
