<?php
session_start();
require_once 'files/form6.php';
require_once 'files/user.php';
require_once 'files/usersubdistrict.php';

$userObj = getUser($_SESSION['LOGGED_USER_ID']);
//check if tbl_form_1 has record by any member of the sub district members of the logged in user...
if($userObj->user_level == '02'){
  $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
  $isForm6AlreadyFilled = checkIfForm6RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
}else if($userObj->user_level == '01'){
  $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
  if(!empty($userObj)){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $isForm6AlreadyFilled = checkIfForm6RecordIsAlreadyEntered('02', $userSubDistrictObj->sub_district_id);
  }
}

if(!$isForm6AlreadyFilled){
  ?>
<h2>Form 6</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q6.1:</td>
            <td>
                <textarea name="q6_1" id="q6_1" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsaveform6"/>
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
<div id="form6ManagementDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        //showListOfForm6Records();

        $('#btnsaveform6').click(function(){
            var q6_1 = $('#q6_1').val();

            if(true){
                var dataString = "q6_1="+q6_1;
                $.ajax({
                    url: 'files/saveform6.php',
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
            $('#q6_1').val('');
        }

        function showListOfForm6Records(){
            $('#form6ManagementDetailDiv').load('files/showlistofform6records.php');
        }

    });//end document.ready function
</script>
