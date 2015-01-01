<?php
session_start();
require_once 'files/form9.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm9AlreadyFilled = checkIfForm9RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm9AlreadyFilled = checkIfForm9RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm9AlreadyFilled){
?>
<h2>Form 9</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q9.1:</td>
            <td>
                <textarea name="q9_1" id="q9_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform9"/>
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
<div id="form9ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm9Records();

        $('#btnsaveform9').click(function(){
            var q9_1 = $('#q9_1').val();

            if(q9_1 !== ""){
                var dataString = "q9_1="+q9_1;
                $.ajax({
                    url: 'files/saveform9.php',
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
            $('#q9_1').val('');
        }

        function showListOfForm9Records(){
            $('#form9ManagementDetailDiv').load('files/showlistofform9records.php');
        }

    });//end document.ready function
</script>
