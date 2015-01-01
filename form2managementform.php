<?php
session_start();
require_once 'files/form2.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm2AlreadyFilled = checkIfForm2RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm2AlreadyFilled = checkIfForm2RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm2AlreadyFilled){
  ?>
<h2>Form 2</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td colspan="2">
                <div id="errorDiv"></div>
            </td>
        </tr>
        <tr>
            <td>Q2.1:</td>
            <td>
                <textarea name="q2_1" id="q2_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2.2:</td>
            <td>
                <textarea name="q2_2" id="q2_2" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2.3:</td>
            <td>
                <textarea name="q2_3" id="q2_3" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr style="visibility:hidden">
            <td>Q2.4:</td>
            <td>
                <textarea name="q2_4" id="q2_4" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform2"/>
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
<div id="form2ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm2Records();

        $('#btnsaveform2').click(function(){
            var q2_1 = $('#q2_1').val();
            var q2_2 = $('#q2_2').val();
            var q2_3 = $('#q2_3').val();
            var q2_4 = $('#q2_4').val();

            if(q2_1 !== "" && q2_2 !== "" && q2_3 !== "" && q2_4 !== ""){
                var dataString = "q2_1="+q2_1+"&q2_2="+q2_2+"&q2_3="+q2_3+
                        "&q2_4="+q2_4;
                $.ajax({
                    url: 'files/saveform2.php',
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
                alert("Please enter all fields");
            }
        });

        function clearInputFields(){
            $('#q2_1').val('');
            $('#q2_2').val('');
            $('#q2_3').val('');
            $('#q2_4').val('');
        }



        function showListOfForm2Records(){
            $('#form2ManagementDetailDiv').load('files/showlistofform2records.php');
        }

    });//end document.ready function
</script>
