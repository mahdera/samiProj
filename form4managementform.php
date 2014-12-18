<?php
session_start();
require_once 'files/form4.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm4AlreadyFilled = checkIfForm4RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm4AlreadyFilled = checkIfForm4RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm4AlreadyFilled){
  ?>
<h2>Form 4</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q4.1:</td>
            <td>
                <textarea name="q4_1" id="q4_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform4"/>
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
<div id="form4ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm4Records();

        $('#btnsaveform4').click(function(){
            var q4_1 = $('#q4_1').val();

            if(true){
                var dataString = "q4_1="+q4_1;
                $.ajax({
                    url: 'files/saveform4.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Saved Successfully');
                        $('#form4Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Saved Successfully</div>');
                        clearInputFields();
                        showListOfForm4Records();
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
            $('#q4_1').val('');
        }

        function showListOfForm4Records(){
            $('#form4ManagementDetailDiv').load('files/showlistofform4records.php');
        }

    });//end document.ready function
</script>
