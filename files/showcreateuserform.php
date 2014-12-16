<?php
  session_start();
  require_once 'district.php';
  require_once 'subdistrict.php';
  require_once 'userdistrict.php';
  require_once 'usersubdistrict.php';
  require_once 'user.php';

  $theUserId = $_SESSION['INDIVIDUAL_INT_USER_ID'];
  $loggedInUserObj = getUser($theUserId);
  $loggedInUserRole = $loggedInUserObj->user_role;
  $zoneList = null;
  $userSubDistrictObj = getSubDistrictInfoForUser($theUserId);
  $loggedInUserSubDistrictId = "";//$userSubDistrictObj->sub_district_id;
  if(!empty($userSubDistrictObj)){
    $loggedInUserSubDistrictId = $userSubDistrictObj->sub_district_id;
  }
  if($loggedInUserObj->member_type == 'Admin'){
        $zoneList = getAllDistricts();
  }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == '01A'){
        $userZoneObj = getDistrictInfoForUser($theUserId);
        if(!empty($userZoneObj)){
          $zoneList = getAllDistrictsWithDistrictId($userZoneObj->district_id);
        }
  }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == '02A'){
        //no need to have something written downhere...
  }

?>
<h1>Create User</h1>
<form>
    <div id="errorDiv"></div>
    <table border="1" width="100%" rules="all">
        <tr>
            <td width="15%"><font color='red'>*</font> First Name:</td>
            <td>
                <input type="text" name="txtfirstname" id="txtfirstname" size="70"/>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> Last Name:</td>
            <td>
                <input type="text" name="txtlastname" id="txtlastname" size="70"/>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> Email:</td>
            <td>
                <input type="email" name="txtemail" id="txtemail" size="70"/>
            </td>
        </tr>
        <tr>
          <td>Phone Number:</td>
          <td>
            <input type="text" name="txtphonenumber" id="txtphonenumber" size="70"/>
          </td>
        </tr>
        <tr>
          <td><font color='red'>*</font> Password:</td>
          <td>
            <input type="password" name="txtpassword" id="txtpassword" size="70"/>
          </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> User Id:</td>
            <td>
                <input type="text" name="txtuserid" id="txtuserid" size="70"/>
            </td>
        </tr>
        <!--<tr>
            <td><font color='red'>*</font> Member Type:</td>
            <td>
                <select name="slctmembertype" id="slctmembertype" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="Admin">Root</option>
                    <option value="User">User</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> User Status:</td>
            <td>
                <select name="slctuserstatus" id="slctuserstatus" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="Active">Active</option>
                    <option value="Blocked">Blocked</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> User Level:</td>
            <td>
                <select name="slctuserlevel" id="slctuserlevel" style="width:100%">
                    <?php
                      /*if($loggedInUserObj->user_role == '02A'){
                        ?>
                            <option value="" selected="selected">--Select--</option>
                            <option value="02">Sub District Level</option>
                        <?php
                      }else{
                        ?>
                            <option value="" selected="selected">--Select--</option>
                            <option value="01">District Level</option>
                            <option value="02">Sub District Level</option>
                        <?php
                      }*/
                    ?>
                </select>
            </td>
        </tr>-->
        <tr>
            <td><font color="red">*</font> User Role:</td>
            <td>
                <div id="userRoleDiv_MODIFIED">
                  <select name="slctuserrole" id="slctuserrole" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                      if($loggedInUserRole == '01A'){
                    ?>
                      <option value="01A">District Administrator</option>
                      <option value="02A">Sub District Administrator</option>
                      <option value="999">Sub District User</option>
                      <!--<option value="">Sub District User (Read-Only)</option>-->
                    <?php
                      }else{
                    ?>
                      <option value="02A">Sub District Administrator</option>
                      <option value="999">Sub District User</option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
            </td>
        </tr>
        <tr id="districtRow" style="display:none">
            <td><font color='red'>*</font> District:</td>
            <td>
                <select name="slctzone" id="slctzone" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($zoneRow = mysql_fetch_object($zoneList)){
                            ?>
                              <option value="<?php echo $zoneRow->id;?>"><?php echo $zoneRow->display_name;?></option>
                            <?php
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <tr id="subDistrictRow" style="display:none">
            <td><font color="red">*</font> Sub District</td>
            <td>
                <select name="slctsubdistrict" id="slctsubdistrict" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                       $subDistrictList = getAllSubDistricts();
                       while( $subDistrictRow = mysql_fetch_object($subDistrictList) ){
                         ?>
                            <option value="<?php echo $subDistrictRow->id;?>"><?php echo $subDistrictRow->display_name;?></option>
                         <?php
                       }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Create User" id="btncreateuser"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#txtfirstname').focus();

        $('#txtemail').blur(function(){
          var email = $('#txtemail').val(),
          emailReg = /^([w-.]+@([w-]+.)+[w-]{2,4})?$/;
          if(!emailReg.test(email) || email == '')
            {
              alert('Please enter a valid email address.');
              return false;
            }
        });


        $('#btncreateuser').click(function(){
            var firstName = $('#txtfirstname').val();
            var lastName = $('#txtlastname').val();
            var email = $('#txtemail').val();
            var userId = $('#txtuserid').val();
            var password = $('#txtpassword').val();
            var phoneNumber = $('#txtphonenumber').val();
            var memberType = 'User';//$('#slctmembertype').val();
            var userStatus = 'Active';//$('#slctuserstatus').val();
            var userLevel = '';//$('#slctuserlevel').val();
            var userRole = $('#slctuserrole').val();



            var eitherZoneIdOrBranchId = "";
            if(userRole == '01A'){
                eitherZoneIdOrBranchId = 1;
                userLevel = "01";
            }else{
                //eitherZoneIdOrBranchId = $('#slctsubdistrict').val();
                //get the loggedinuser sub distrit id
                var loggedInUserRole = "<?php echo $loggedInUserRole;?>";
                var loggedInUserSubDistrictId = "<?php echo $loggedInUserSubDistrictId;?>";
                if(loggedInUserRole == '02A'){
                  eitherZoneIdOrBranchId = loggedInUserSubDistrictId;
                }else{
                  eitherZoneIdOrBranchId = $('#slctsubdistrict').val();
                }
                userLevel = "02";
            }

            if(phoneNumber !== ""){
                //validate phone
                var intRegex = /[0-9 -()+]+$/;
                if((phoneNumber.length < 6) || (!intRegex.test(phoneNumber))){
                  alert('Please enter a valid phone number.');
                  return false;
                }
            }




            if(firstName !== "" && lastName !== "" && email !== "" && userId !== "" &&
                    password !== "" && eitherZoneIdOrBranchId !== "" && userRole !== ""){

                var dataString = "firstName="+firstName+"&lastName="+lastName+
                        "&email="+email+"&userId="+userId+"&password="+password+
                        "&phoneNumber="+phoneNumber+"&memberType="+memberType+
                        "&userStatus="+userStatus+"&userLevel="+encodeURIComponent(userLevel)+"&eitherZoneIdOrBranchId="+
                        eitherZoneIdOrBranchId+"&userRole="+encodeURIComponent(userRole);

                //validate email
                var txt = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!txt.test(email)) {
                  alert('Please enter a valid email address!');
                  return false;
                }

                $.ajax({
                    url: 'files/createuser.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#createUserDiv').html('');
                        $('.content').load('files/showusermanagementlist.php');
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert('Enter the required filed members!');
            }
        });

        $('#txtuserid').focusout(function(){
          var userId = $(this).val();
          if(userId != ""){
            var dataString = "userId="+userId;
            $.ajax({
              url: 'files/checkifthisuseridisalreadytaken.php',
              data: dataString,
              type:'POST',
              success:function(response){
                if(response == 'Taken'){
                  $('#errorDiv').html("<div class='notify notify-red'><span class='symbol icon-error'></span> This User ID is already taken!</div>");
                  $('#txtuserid').focus();
                  $('#btncreateuser').hide();
                }else{
                  $('#errorDiv').html('');
                  $('#btncreateuser').show();
                }
                //$('#errorDiv').html(response);
              },
              error:function(error){
                alert(error);
              }
            });
          }
        });

        /*$('#slctzone').change(function(){
            var zoneId = $(this).val();
            var userLevel = $('#slctuserlevel').val();
            if(zoneId !== '' && userLevel == '02'){
                var dataString = "zoneId="+zoneId;
                $.ajax({
                    url: 'files/showlistofbranchsforthiszone.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#branchRow').remove();
                        $('#zoneRow').after(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });*/

        /*$('#slctuserlevel').change(function(){
            var userLevel = $(this).val();
            if(userLevel != ''){
                if(userLevel == '01'){
                    $('#branchRow').remove();
                    $('#userRoleDiv').load('files/showuserrolefordistrictleveluser.php');
                }else if(userLevel == '02'){
                    var zoneId = $('#slctzone').val();
                    var dataString = "zoneId="+zoneId;
                    $.ajax({
                        url: 'files/showlistofbranchsforthiszone.php',
                        data: dataString,
                        type:'POST',
                        success:function(response){
                            $('#branchRow').remove();
                            $('#zoneRow').after(response);
                        },
                        error:function(error){
                            alert(error);
                        }
                    });
                    $('#userRoleDiv').load('files/showuserroleforsubdistrictleveluser.php');
                }
            }
        });*/

        $('#slctuserrole').change(function(){
          var userRole = $(this).val();
          var loggedInUserRole = "<?php echo $loggedInUserRole;?>";
          if(loggedInUserRole == '01A'){
            if(userRole !== ""){
              if(userRole == "01A"){
                $('#subDistrictRow').hide();
                $('#districtRow').hide();
              }else if(userRole == "02A" || userRole == "999"){
                $('#subDistrictRow').show();
                $('#districtRow').hide();
              }
            }
          }else{
             if(userRole !== ""){
              if(userRole == "01A"){
                $('#subDistrictRow').hide();
                $('#districtRow').show();
              }else if(userRole == "02A" || userRole == "999"){
                $('#subDistrictRow').hide();
                $('#districtRow').hide();
              }
            }
          }
        });

    });//end document.ready function
</script>
