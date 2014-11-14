<?php
  session_start();
  require_once 'zone.php';
  require_once 'branch.php';
  require_once 'userzone.php';
  require_once 'userbranch.php';
  require_once 'user.php';

  $theUserId = $_SESSION['INDIVIDUAL_INT_USER_ID'];
  $loggedInUserObj = getUser($theUserId);
  $zoneList = null;
  if($loggedInUserObj->member_type == 'Admin'){
        $zoneList = getAllZones();
  }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == 'Zone Admin'){
        $userZoneObj = getZoneInfoForUser($theUserId);
        $zoneList = getAllZonesWithZoneId($userZoneObj->zone_id);
  }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == 'Branch Admin'){
        //$userBranchObj = getBranchInfoForUser($theUserId);

  }

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
                <input type="email" name="txtemail" id="txtemail"/>
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
            <td><font color='red'>*</font> Member Type:</td>
            <td>
                <select name="slctmembertype" id="slctmembertype" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="Admin">Admin</option>
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
                      if($loggedInUserObj->user_role == 'Branch Admin'){
                        ?>
                            <option value="" selected="selected">--Select--</option>
                            <option value="Branch Level">Branch Level</option>
                        <?php
                      }else{
                        ?>
                            <option value="" selected="selected">--Select--</option>
                            <option value="Branch Level">Branch Level</option>
                            <option value="Zone Level">Zone Level</option>
                        <?php
                      }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><font color="red">*</font> User Role:</td>
            <td>
                <select name="slctuserrole" id="slctuserrole" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <option value="Branch Admin">Branch Admin</option>
                    <option value="User">User</option>
                    <option value="Zone Admin">Zone Admin</option>
                </select>
            </td>
        </tr>
        <tr id="zoneRow">
            <td><font color='red'>*</font> Zone:</td>
            <td>
                <select name="slctzone" id="slctzone" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($zoneRow = mysql_fetch_object($zoneList)){
                            ?>
                              <option value="<?php echo $zoneRow->id;?>"><?php echo $zoneRow->zone_name;?></option>
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

        $('#btncreateuser').click(function(){
            var firstName = $('#txtfirstname').val();
            var lastName = $('#txtlastname').val();
            var email = $('#txtemail').val();
            var userId = $('#txtuserid').val();
            var password = $('#txtpassword').val();
            var phoneNumber = $('#txtphonenumber').val();
            var memberType = $('#slctmembertype').val();
            var userStatus = $('#slctuserstatus').val();
            var userLevel = $('#slctuserlevel').val();
            var userRole = $('#slctuserrole').val();
            var eitherZoneIdOrBranchId = "";
            if(userLevel == 'Zone Level'){
                eitherZoneIdOrBranchId = $('#slctzone').val();
            }else if(userLevel == 'Branch Level'){
                eitherZoneIdOrBranchId = $('#slctbranch').val();
            }

            if(firstName !== "" && lastName !== "" && email !== "" && userId !== "" &&
                    password !== "" && memberType !== "" && userStatus !== "" && eitherZoneIdOrBranchId !== "" &&
                    userLevel !== "" && userRole !== ""){
                var dataString = "firstName="+firstName+"&lastName="+lastName+
                        "&email="+email+"&userId="+userId+"&password="+password+
                        "&phoneNumber="+phoneNumber+"&memberType="+memberType+
                        "&userStatus="+userStatus+"&userLevel="+encodeURIComponent(userLevel)+"&eitherZoneIdOrBranchId="+
                        eitherZoneIdOrBranchId+"&userRole="+encodeURIComponent(userRole);
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

        $('#slctzone').change(function(){
            var zoneId = $(this).val();
            var userLevel = $('#slctuserlevel').val();
            if(zoneId !== '' && userLevel == 'Branch Level'){
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
                if(memberType == 'Zone Level'){
                    $('#branchRow').remove();
                }else if(memberType == 'Branch Level'){
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
        });

        $('#slctuserrole').change(function(){
          var userRole = $(this).val();
          var userLevel = $('#slctuserlevel').val();
          if(userRole !== '' && userLevel !== ''){
              if(userLevel == 'Branch Level' && userRole == 'Zone Admin'){
                  alert('A branch level user can not have a Zone Admin role! Please select again!');
                  $('#slctuserrole').val('');
              }else if(userLevel == 'Zone Level' && userRole == 'Branch Admin'){
                  alert('A zone level user can not have a Branch Admin role! Please select again!');
                  $('#slctuserrole').val('');
              }
          }
        });

    });//end document.ready function
</script>
