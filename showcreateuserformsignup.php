<?php
  //error_reporting( 0 );
  require_once 'files/district.php';
  require_once 'files/subdistrict.php';
  $zoneList = getAllDistricts();
?>
<h1>Create User</h1>
<form>
    <table border="0" width="100%">
        <tr>
            <td><font color='red'>*</font> First Name:</td>
            <td>
                <input type="text" name="txtfirstname" id="txtfirstname"/>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> Last Name:</td>
            <td>
                <input type="text" name="txtlastname" id="txtlastname"/>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> Email:</td>
            <td>
                <input type="text" name="txtemail" id="txtemail"/>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> User Id:</td>
            <td>
                <input type="text" name="txtuserid" id="txtuserid"/>
            </td>
        </tr>
        <tr>
            <td><font color='red'>*</font> Password:</td>
            <td>
                <input type="password" name="txtpassword" id="txtpassword"/>
            </td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td>
                <input type="text" name="txtphonenumber" id="txtphonenumber"/>
            </td>
        </tr>
        <tr>
          <td><font color="red">*</font> User Role:</td>
          <td>
            <div id="userRoleDiv_MODIFIED">
              <select name="slctuserrole" id="slctuserrole" style="width:100%">
                <option value="" selected="selected">--Select--</option>
                <option value="01A">District Administrator</option>
                <option value="02A">Sub District Administrator</option>
                <option value="999">Sub District User</option>
                <!--<option value="">Sub District User (Read-Only)</option>-->
              </select>
            </div>
          </td>
        </tr>
        <tr id="subDistrictRow">
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
        });

        $('#slctuserlevel').change(function(){
            var memberType = $(this).val();
            if(memberType != ''){
                if(memberType == '01'){
                    $('#branchRow').remove();
                }else if(memberType == '02'){
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
                }
            }
        });*/

        $('#btncreateuser').click(function(){
            var firstName = $('#txtfirstname').val();
            var lastName = $('#txtlastname').val();
            var email = $('#txtemail').val();
            var userId = $('#txtuserid').val();
            var password = $('#txtpassword').val();
            var phoneNumber = $('#txtphonenumber').val();
            var memberType = 'User';//$('#slctmembertype').val();
            var userStatus = 'Pending';//$('#slctuserstatus').val();
            var userLevel = '';//$('#slctuserlevel').val();
            var userRole = $('#slctuserrole').val();
            var eitherZoneIdOrBranchId = '';

            if(userRole == '01A'){
                eitherZoneIdOrBranchId = 1;
                userLevel = '01';
            }else{
                eitherZoneIdOrBranchId = $('#slctsubdistrict').val();
                userLevel = '02';
            }

            if(firstName !== "" && lastName !== "" && email !== "" && userId !== "" &&
                    password !== "" && eitherZoneIdOrBranchId !== "" && userRole !== ""){
                var dataString = "firstName="+firstName+"&lastName="+lastName+
                        "&email="+email+"&userId="+userId+"&password="+password+
                        "&phoneNumber="+phoneNumber+"&memberType="+memberType+
                        "&userStatus="+userStatus+"&eitherZoneIdOrBranchId="+eitherZoneIdOrBranchId+
                        "&userLevel="+encodeURIComponent(userLevel)+"&userRole="+encodeURIComponent(userRole);
                $.ajax({
                    url: 'files/createusersignup.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        //$('#createUserDiv').html('');
                        $('#extraContent').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert('Enter the required filed members!');
            }
        });

        $('#slctuserrole').change(function(){
          var userRole = $(this).val();
          /*var userLevel = $('#slctuserlevel').val();
          if(userRole !== '' && userLevel !== ''){
              if(userLevel == '02' && userRole == '01A'){
                  alert('A sub district level user can not have a District Admin role! Please select again!');
                  $('#slctuserrole').val('');
              }else if(userLevel == '01' && userRole == '02A'){
                  alert('A district level user can not have a Sub District Admin role! Please select again!');
                  $('#slctuserrole').val('');
              }
          }*/
          if(userRole !== ""){
            if(userRole == "01A"){
              $('#subDistrictRow').hide();
            }else{
              $('#subDistrictRow').show();
            }
          }
        });

        /*$('#slctuserlevel').change(function(){
            var userLevel = $(this).val();
            if(userLevel != ""){
                if(userLevel == "01"){
                    $('#userLevelDiv').load('showuserrolefordistrictlevel.php');
                }else if(userLevel == "02"){
                    $('#userLevelDiv').load('showuserroleforsubdistrictlevel.php');
                }
            }
        });*/
    });//end document.ready function
</script>
