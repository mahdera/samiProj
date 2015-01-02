<?php
@session_start();
require_once 'files/th.php';
require_once 'files/fn.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';
require_once 'files/userdistrict.php';
require_once 'files/goalsecondfn.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
$fnIdArray = array();


if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $fnIdArray = getAllFilteredLatestFnIdsEnteredByUserUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
    $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObject)){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
        //$fnIdArray = getAllFilteredLatestFnIdsEnteredByUserUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        $fnIdArray = getAllFilteredSelectedThFnIds($_SESSION['SELECTED_THS']);
    }
}

?>

<h1>Goal Second Management</h1>
<table border="1" width="100%" rules="all">
    <tr style="background:#eee">
        <td>Fn</td>
        <td>Actions</td>
    </tr>
    <?php
        //var_dump($fnIdArray);
        for($i=0; $i < count($fnIdArray); $i++){
            $fnObj = getFn($fnIdArray[$i]);
            if($fnObj->fn_name != 'None'){
            $divId = "goalSecondDetailDiv" . $fnObj->id;
            ?>
            <tr>
                <td width="60%"><?php echo $fnObj->fn_name;?></td>
                <td>
                    <?php
                    //now i need to check who the logged in user is
                    $doesThisFnHasGoalSecondSavedForItInThisSubDistrict = 0;
                    if($userObj->user_level == '02'){
                        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                        $doesThisFnHasGoalSecondSavedForItInThisSubDistrict = doesThisFnHasGoalSecondSavedForItInThisSubDistrict($fnObj->id, $userSubDistrictObj->sub_district_id);
                    }else if($userObj->user_level == '01'){
                        $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                        if(!empty($userObject)){
                            $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
                            $doesThisFnHasGoalSecondSavedForItInThisSubDistrict = doesThisFnHasGoalSecondSavedForItInThisSubDistrict($fnObj->id, $userSubDistrictObj->sub_district_id);
                        }
                    }


                    if(!$doesThisFnHasGoalSecondSavedForItInThisSubDistrict){
                        ?>
                            <a href="#.php" id="<?php echo $fnObj->id;?>" class="addGoalSecondDetailClass">Add</a>
                        <?php
                    }else{
                        ?>
                            <a href="#.php" id="<?php echo $fnObj->id;?>" class="openGoalSecondDetailForEditClass">Edit</a>
                        <?php
                    }
                    ?>
                    <?php
                    if($doesThisFnHasGoalSecondSavedForItInThisSubDistrict){
                        ?>
                        |
                            <a href="#.php" id="<?php echo $fnObj->id;?>" class="deleteGoalSecondDetailClass">Delete</a>
                        <?php
                    }
                    ?>
                    |
                        <a href="#.php" id="<?php echo $fnObj->id;?>" class="closeActionFormClass">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="<?php echo $divId;?>"></div>
                </td>
            </tr>
            <?php
            }//end fn checking if condition
        }//end for...loop
    ?>
</table>

<script type="text/javascript">

    $(document).ready(function(){

        /////////////most important addition to the JavaScript section/////
        $('.openGoalSecondDetailForEditClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "goalSecondDetailDiv" + idVal;
            var fnIdArray = <?php echo json_encode($fnIdArray);?>;
            for(var i=0; i<fnIdArray.length;i++){
                var clearDivId = "goalSecondDetailDiv" + fnIdArray[i];
                $('#'+clearDivId).html('');
            }//end for...loop
            $('#' + divId).load('files/showgoalseconddetailhereforedit.php?fn_id='+idVal, {noncache: new Date().getTime()});
        });

        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "goalSecondDetailDiv" + idVal;
            $('#' + divId).html('');
        });

        $('.addGoalSecondDetailClass').click(function(){
            var idVal = $(this).attr('id');
            //alert('fn id: '+idVal);
            var divId = "goalSecondDetailDiv" + idVal;
            var fnIdArray = <?php echo json_encode($fnIdArray);?>;
            for(var i=0; i<fnIdArray.length;i++){
                var clearDivId = "goalSecondDetailDiv" + fnIdArray[i];
                $('#'+clearDivId).html('');
            }//end for...loop
            $('#'+divId).load('files/showaddgoalseconddetailform.php?fnId='+idVal, {noncache: new Date().getTime()});
        });

        $('.deleteGoalSecondDetailClass').click(function(){
            if(window.confirm('Are you sure you want to delete this record?')){
                var idVal = $(this).attr('id');
                var dataString = "fnId=" + idVal;
                $.ajax({
                    url: 'files/deletegoalsecond.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#goalSecondDivToRefresh').load('goalsecondmanagementform_modified.php', {noncache: new Date().getTime()});
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
        ////end most important addition to the JavaScript section////

    });//end document.ready function

</script>
