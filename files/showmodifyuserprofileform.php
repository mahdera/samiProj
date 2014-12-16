<?php
    session_start();
    $id = $_GET['id'];
    require_once 'user.php';
    require_once 'userdistrict.php';
    require_once 'usersubdistrict.php';
    require_once 'district.php';
    require_once 'subdistrict.php';
    $theUserId = $_SESSION['INDIVIDUAL_INT_USER_ID'];
    $loggedInUserObj = getUser($theUserId);
    $loggedInUserLevel = $loggedInUserObj->user_level;
    //now get the user info using the id value
    $userObj = getUser($id);
    $userLevel = $userObj->user_level;
    $userRole = $userObj->user_role;
    $memberType = $userObj->member_type;
    $userStatus = $userObj->user_status;
?>
<h1>Update User Profile</h1>
<form>
    <table border="1" width="100%" rules="all">
        <tr>
            <td>First Name:</td>
            <td>
                <input type="text" name="txteditfirstname" id="txteditfirstname" value="<?php echo stripslashes($userObj->first_name);?>"/>
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td>
                <input type="text" name="txteditlastname" id="txteditlastname" value="<?php echo stripslashes($userObj->last_name);?>"/>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="text" name="txteditemail" id="txteditemail" value="<?php echo stripslashes($userObj->email);?>"/>
            </td>
        </tr>
        <tr style="display:none">
            <td>Member Type:</td>
            <td>
                <select name="slcteditmembertype" id="slcteditmembertype" style="width: 100%">
                    <?php
                        if($userObj->member_type === "Admin"){
                            ?>
                                <option value="Admin" selected="selected">Admin</option>
                                <option value="User">User</option>
                            <?php
                        }else if($userObj->member_type === "User"){
                            ?>
                                <option value="Admin">Admin</option>
                                <option value="User" selected="selected">User</option>
                            <?php
                        }else{
                            ?>
                                <option value="" selected="selected">--Select--</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td>
                <input type="text" name="txteditphonenumber" id="txteditphonenumber" value="<?php echo $userObj->phone_number;?>"/>
            </td>
        </tr>
        <?php
          if($theUserId == $id){
            ?>
              <tr style="display:none">
            <?php
          }else{
            ?>
              <tr>
            <?php
          }
        ?>
            <td>Status:</td>
            <td>
                <select name="slctedituserstatus" id="slctedituserstatus" style="width: 100%">
                    <?php
                        if($userObj->user_status === "Active"){
                            ?>
                                <option value="Active" selected="selected">Active</option>
                                <option value="Blocked">Blocked</option>
                                <!--<option value="Pending">Pending</option>-->
                            <?php
                        }else if($userObj->user_status === "Blocked"){
                            ?>
                                <option value="Active">Active</option>
                                <option value="Blocked" selected="selected">Blocked</option>
                                <!--<option value="Pending">Pending</option>-->
                            <?php
                        }else if($userObj->user_status === "Pending"){
                            ?>
                                <option value="Active">Active</option>
                                <option value="Blocked">Blocked</option>
                                <!--<option value="Pending" selected="selected">Pending</option>-->
                            <?php
                        }else{
                            ?>
                                <option value="" selected="selected">--Select--</option>
                                <option value="Active">Active</option>
                                <option value="Blocked">Blocked</option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr style="display:none">
            <td><font color='red'>*</font> User Level:</td>
            <td>
                <select name="slctuserlevel" id="slctuserlevel" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                  <?php
                    if($loggedInUserObj->user_role == '02A'){
                      ?>
                        <option value="02A" selected="selected">Sub District Admin</option>
                      <?php
                    }else{
                      if($userObj->user_level === '02'){
                        ?>
                          <option value="02" selected="selected">Sub District Level</option>
                          <option value="01">District Level</option>
                        <?php
                      }else if($userObj->user_level === '01'){
                        ?>
                          <option value="02">Sub District Level</option>
                          <option value="01" selected="selected">District Level</option>
                        <?php
                      }else{
                        ?>
                          <option value="02">Sub District Level</option>
                          <option value="01">District Level</option>
                        <?php
                      }
                    }
                  ?>
                </select>
            </td>
        </tr>
        <?php
        if($theUserId == $id){
          ?>
          <tr style="display:none">
            <?php
          }else{
            ?>
            <tr>
              <?php
            }
        ?>
            <td>User Role:</td>
            <td>
                <select name="slctuserrole" id="slctuserrole" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                    if($loggedInUserLevel == '01'){
                      if($userObj->user_role === '02A'){
                        ?>
                            <option value="01A">District Admin</option>
                            <option value="02A" selected="selected">Sub District Admin</option>
                            <option value="999">Sub District User</option>
                        <?php
                      }else if($userObj->user_role === '999'){
                        ?>
                            <option value="01A">District Admin</option>
                            <option value="02A">Sub District Admin</option>
                            <option value="999" selected="selected">Sub District User</option>
                        <?php
                      }else if($userObj->user_role === '01A'){
                        ?>
                            <option value="01A" selected="selected">District Admin</option>
                            <option value="02A">Sub District Admin</option>
                            <option value="999">Sub District User</option>
                        <?php
                      }else{
                        ?>
                            <option value="01A">District Admin</option>
                            <option value="02A">Sub District Admin</option>
                            <option value="999">Sub District User</option>
                        <?php
                      }
                    }else{
                      //if the logged-in user is a sub district admin-level 02
                      if($userObj->user_role === '02A'){
                        ?>
                        <option value="02A" selected="selected">Sub District Admin</option>
                        <option value="999">Sub District User</option>
                        <?php
                      }else if($userObj->user_role === '999'){
                        ?>
                        <option value="02A">Sub District Admin</option>
                        <option value="999" selected="selected">Sub District User</option>
                        <?php
                      }else{
                        ?>
                        <option value="02A">Sub District Admin</option>
                        <option value="999" selected="selected">Sub District User</option>
                        <?php
                      }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
          $zoneObj = null;
          $branchObj = null;
          if($userObj->user_level == '01'){
            $userZone = getDistrictInfoForUser($userObj->id);
            if($userZone != null)
              $zoneObj = getDistrict($userZone->district_id);
          }else if($userObj->user_level == '02'){
            $userBranch = getSubDistrictInfoForUser($userObj->id);
            if($userBranch != null){
              $branchObj = getSubDistrict($userBranch->sub_district_id);
              $zoneObj = getDistrict($branchObj->district_id);
            }
          }
          $zoneList = getAllDistricts();
        ?>
        <tr id="zoneRow" style="display:none">
            <td><font color='red'>*</font> District:</td>
            <td>
                <select name="slctzone" id="slctzone" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($zoneRow = mysql_fetch_object($zoneList)){
                            if($zoneObj != null && $zoneObj->id == $zoneRow->id){
                              ?>
                                <option value="<?php echo $zoneRow->id;?>" selected="selected"><?php echo $zoneRow->display_name;?></option>
                              <?php
                            }else{
                              ?>
                                <option value="<?php echo $zoneRow->id;?>"><?php echo $zoneRow->display_name;?></option>
                              <?php
                            }
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <?php
          if($userObj->user_level == '02'){
            //get the zone info of this user and based on that populate the branch dropdown...
            $branchList = null;
            if($zoneObj != null){
                $userSubDistrictInfo = getSubDistrictInfoForUser($_SESSION['LOGGED_USER_ID']);//getAllSubDistrictsOfThisDistrict($zoneObj->id);
                //now based on that get Sub district list for user
                if(!empty($userSubDistrictInfo)){
                  $branchList = getAllSubDistrictWithSubDistrictId($userSubDistrictInfo->sub_district_id);
                }else{
                  //the logged in user is a district user so get all sub districts...
                  $branchList = getAllSubDistrictsOfThisDistrict(1);
                }
            }
            ?>
            <tr id="branchRow">
                <td><font color='red'>*</font> Sub District:</td>
                <td>
                    <select name="slctbranch" id="slctbranch" style="width:100%">
                        <option value="" selected="selected">--Select--</option>
                        <?php
                        if($branchList != null){
                          while($branchRow = mysql_fetch_object($branchList)){
                            if($branchRow->id == $branchObj->id){
                              ?>
                                <option value="<?php echo $branchRow->id;?>" selected="selected"><?php echo $branchRow->display_name;?></option>
                              <?php
                            }else{
                              ?>
                                <option value="<?php echo $branchRow->id;?>"><?php echo $branchRow->display_name;?></option>
                              <?php
                            }
                          }//end while loop
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <?php
          }else if($userObj->user_level == '01'){
            //no need to add something here...
          }
        ?>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="btnupdate"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnupdate').click(function(){
            var firstName = $('#txteditfirstname').val();
            var lastName = $('#txteditlastname').val();
            var email = $('#txteditemail').val();
            var memberType = "<?php echo $memberType;?>";//$('#slcteditmembertype').val();
            var userStatus = null;
            var theUserId = "<?php $theUserId;?>";
            var id = "<?php echo $id;?>";
            if(theUserId == id){
                userStatus = 'Active';
            }else{
                userStatus = $('#slctedituserstatus').val();
            }

            var phoneNumber = $('#txteditphonenumber').val();

            //userLevel should be calculated by the value of the user role field...
            var userLevel = null;
            var eitherZoneIdOrBranchId = "";
            var userRole = null;

            if(theUserId == id){
              userRole = "<?php echo $userRole;?>";
            }else{
              userRole = $('#slctuserrole').val();
            }

            if(userRole == '01A'){
                userLevel = '01';
            }else if(userRole == '02A' || userRole == '999'){
                userLevel = '02';
            }

            if(userLevel == '01'){
                eitherZoneIdOrBranchId = 1;//$('#slctzone').val();
            }else if(userLevel == '02'){
                eitherZoneIdOrBranchId = $('#slctbranch').val();
            }

            if(firstName !== "" && lastName !== "" && email !== "" && userStatus !== "" && eitherZoneIdOrBranchId !== "" && userRole !== ""){
                var dataString = "id="+id+"&firstName="+firstName+"&lastName="+lastName+"&email="+email+
                        "&memberType="+memberType+"&userStatus="+userStatus+"&phoneNumber="+phoneNumber+
                        "&userLevel="+encodeURIComponent(userLevel)+"&eitherZoneIdOrBranchId="+
                        eitherZoneIdOrBranchId+"&userRole="+encodeURIComponent(userRole);
                $.ajax({
                    url: 'files/updateuserprofile.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('.content').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert("Enter the missing data value!");
            }
        });

        $('#slctzone').change(function(){
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
        });

        $('#slctuserrole').change(function(){
            var loggedInUserLevel = "<?php echo $loggedInUserLevel;?>";
            var userRole = $(this).val();
            //alert(userRole);
            if(loggedInUserLevel == '01'){
                if(userRole == "02A" || userRole == "999"){
                    //time to show the district dropdown...
                    //var zoneId = $('#slctzone').val();
                    var dataString = "zoneId=1";
                    //alert(dataString);
                    $.ajax({
                      url: 'files/showlistofbranchsforthiszone.php',
                      data: dataString,
                      type:'POST',
                      success:function(response){
                        $('#branchRowDetail').remove();
                        $('#branchRow').remove();
                        $('#zoneRow').after(response);
                      },
                      error:function(error){
                        alert(error);
                      }
                    });
                }else{
                  $('#branchRowDetail').remove();
                  $('#branchRow').remove();
                }
            }
        });

    });//end document.ready function
</script>
