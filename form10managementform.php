<?php
session_start();
require_once 'files/form10.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm10AlreadyFilled = checkIfForm10RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm10AlreadyFilled = checkIfForm10RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm10AlreadyFilled){
?>
<h2>Form 10</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q10.1:</td>
            <td>
                <textarea name="q10_1" id="q10_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform10"/>
            </td>
        </tr>
    </table>
</form>
<?php
}else{
  ?>
  <div class="notify notify-yellow"><span class="symbol icon-info"></span> Record already exists in database.</div>
  <?php
}
?>
<div id="form10ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm10Records();

        $('#btnsaveform10').click(function(){
            var q10_1 = $('#q10_1').val();

            if(q10_1 !== ""){
                var dataString = "q10_1="+q10_1;
                $.ajax({
                    url: 'files/saveform10.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#innerDivToRefresh').load('showformmanagementgrid.php', {noncache: new Date().getTime()});
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert("Please enter value in the input field");
            }
        });

        function clearInputFields(){
            $('#q10_1').val('');
        }

        function showListOfForm10Records(){
            $('#form10ManagementDetailDiv').load('files/showlistofform10records.php', {noncache: new Date().getTime()});
        }

    });//end document.ready function
</script>
