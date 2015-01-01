<?php
session_start();
require_once 'files/form8.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm8AlreadyFilled = checkIfForm8RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm8AlreadyFilled = checkIfForm8RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm8AlreadyFilled){
  ?>
<h2>Form 8</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q8.1:</td>
            <td>
                <textarea name="q8_1" id="q8_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform8"/>
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
<div id="form8ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm8Records();

        $('#btnsaveform8').click(function(){
            var q8_1 = $('#q8_1').val();

            if(q8_1 !== ""){
                var dataString = "q8_1="+q8_1;
                $.ajax({
                    url: 'files/saveform8.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#innerDivToRefresh').load('showformmanagementgrid.php');
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
            $('#q8_1').val('');
        }

        function showListOfForm8Records(){
            $('#form8ManagementDetailDiv').load('files/showlistofform8records.php');
        }

    });//end document.ready function
</script>
