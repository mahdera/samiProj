<?php
session_start();
require_once 'files/form7.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm7AlreadyFilled = checkIfForm7RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm7AlreadyFilled = checkIfForm7RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm7AlreadyFilled){
  ?>
<h2>Form 7</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q7.1:</td>
            <td>
                <textarea name="q7_1" id="q7_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform7"/>
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
<div id="form7ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm7Records();

        $('#btnsaveform7').click(function(){
            var q7_1 = $('#q7_1').val();

            if(q7_1 !== ""){
                var dataString = "q7_1="+q7_1;
                $.ajax({
                    url: 'files/saveform7.php',
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
            $('#q7_1').val('');
        }

        function showListOfForm7Records(){
            $('#form7ManagementDetailDiv').load('files/showlistofform7records.php');
        }

    });//end document.ready function
</script>
