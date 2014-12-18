<?php
session_start();
require_once 'files/form5.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm5AlreadyFilled = checkIfForm5RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm5AlreadyFilled = checkIfForm5RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm5AlreadyFilled){
  ?>
<h2>Form 5</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q5.1:</td>
            <td>
                <textarea name="q5_1" id="q5_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform5"/>
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
<div id="form5ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm5Records();

        $('#btnsaveform5').click(function(){
            var q5_1 = $('#q5_1').val();

            if(true){
                var dataString = "q5_1="+q5_1;
                $.ajax({
                    url: 'files/saveform5.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //alert('Saved Successfully');
                        $('#form5Div').html('<div class="notify notify-green"><span class="symbol icon-tick"></span> Saved Successfully</div>');
                        clearInputFields();
                        showListOfForm5Records();
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
            $('#q5_1').val('');
        }

        function showListOfForm5Records(){
            $('#form5ManagementDetailDiv').load('files/showlistofform5records.php');
        }

    });//end document.ready function
</script>
