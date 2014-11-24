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
    //now get the user info using the id value
    $userObj = getUser($id);
?>
<h1>Update User Profile</h1>
<form>
    <table border="0" width="100%">
        <tr>
            <td>First Name:</td>
            <td>
                <input type="text" name="txteditfirstname" id="txteditfirstname" value="<?php echo $userObj->first_name;?>"/>
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td>
                <input type="text" name="txteditlastname" id="txteditlastname" value="<?php echo $userObj->last_name;?>"/>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <input type="text" name="txteditemail" id="txteditemail" value="<?php echo $userObj->email;?>"/>
            </td>
        </tr>
        <tr>
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
        <tr>
            <td>User Status:</td>
            <td>
                <select name="slctedituserstatus" id="slctedituserstatus" style="width: 100%">
                    <?php
                        if($userObj->user_status === "Active"){
                            ?>
                                <option value="Active" selected="selected">Active</option>
                                <option value="Blocked">Blocked</option>
                                <option value="Pending">Pending</option>
                            <?php
                        }else if($userObj->user_status === "Blocked"){
                            ?>
                                <option value="Active">Active</option>
                                <option value="Blocked" selected="selected">Blocked</option>
                                <option value="Pending">Pending</option>
                            <?php
                        }else if($userObj->user_status === "Pending"){
                            ?>
                                <option value="Active">Active</option>
                                <option value="Blocked">Blocked</option>
                                <option value="Pending" selected="selected">Pending</option>
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
        <tr>
            <td><font color='red'>*</font> User Level:</td>
            <td>
                <select name="slctuserlevel" id="slctuserlevel" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                  <?php
                    if($loggedInUserObj->user_role == '02A'){
                      ?>
                        <option value="02A" selected="selected">Sub District Level</option>
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
        <tr>
            <td>User Role:</td>
            <td>
                <select name="slctuserrole" id="slctuserrole" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                      if($userObj->user_role === 'Sub District Admin'){
                        ?>
                            <option value="02A" selected="selected">Sub District Admin</option>
                            <option value="999">User</option>
                            <option value="01A">District Admin</option>
                        <?php
                      }else if($userObj->user_role === 'User'){
                        ?>
                            <option value="02A">Sub District Admin</option>
                            <option value="999" selected="selected">User</option>
                            <option value="01A">District Admin</option>
                        <?php
                      }else if($userObj->user_role === 'District Admin'){
                        ?>
                            <option value="02A">Sub District Admin</option>
                            <option value="999">User</option>
                            <option value="01A" selected="selected">District Admin</option>
                        <?php
                      }else{
                        ?>
                            <option value="02A">Sub District Admin</option>
                            <option value="999">User</option>
                            <option value="01A">District Admin</option>
                        <?php
                      }
                        ?>
                </select>
            </td>
        </tr>
        <?php
          $zoneObj = null;
          $branchObj = null;
          if($userObj->user_level == 'District Level'){
            $userZone = getDistrictInfoForUser($userObj->id);
            $zoneObj = getDistrict($userZone->district_id);
          }else if($userObj->user_level == 'Sub District Level'){
            $userBranch = getSubDistrictInfoForUser($userObj->id);
            if($userBranch != null){
              $branchObj = getSubDistrict($userBranch->sub_district_id);
              $zoneObj = getDistrict($branchObj->district_id);
            }
          }
          $zoneList = getAllDistricts();
        ?>
        <tr id="zoneRow">
            <td><font color='red'>*</font> District:</td>
            <td>
                <select name="slctzone" id="slctzone" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        while($zoneRow = mysql_fetch_object($zoneList)){
                            if($zoneObj != null && $zoneObj->id == $zoneRow->id){
                              ?>
                                <option value="<?php echo $zoneRow->id;?>" selected="selected"><?php echo $zoneRow->district_name;?></option>
                              <?php
                            }else{
                              ?>
                                <option value="<?php echo $zoneRow->id;?>"><?php echo $zoneRow->district_name;?></option>
                              <?php
                            }
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <?php
          if($userObj->user_level == 'Sub District Level'){
            //get the zone info of this user and based on that populate the branch dropdown...
            $branchList = null;
            if($zoneObj != null){
                $branchList = getAllSubDistrictsOfThisDistrict($zoneObj->id);
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
                                <option value="<?php echo $branchRow->id;?>" selected="selected"><?php echo $branchRow->sub_district_name;?></option>
                              <?php
                            }else{
                              ?>
                                <option value="<?php echo $branchRow->id;?>"><?php echo $branchRow->sub_district_name;?></option>
                              <?php
                            }
                          }//end while loop
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <?php
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
            var memberType = $('#slcteditmembertype').val();
            var userStatus = $('#slctedituserstatus').val();
            var phoneNumber = $('#txteditphonenumber').val();
            var id = "<?php echo $id;?>";
            var userLevel = $('#slctuserlevel').val();
            var eitherZoneIdOrBranchId = "";
            var userRole = $('#slctuserrole').val();
            if(userLevel == 'District Level'){
                eitherZoneIdOrBranchId = $('#slctzone').val();
            }else if(userLevel == 'Sub District Level'){
                eitherZoneIdOrBranchId = $('#slctbranch').val();
            }

            if(firstName !== "" && lastName !== "" && email !== "" && memberType !== "" &&
                    userStatus !== "" && eitherZoneIdOrBranchId !== "" && userRole !== ""){
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
            if(zoneId !== '' && userLevel == 'Sub District Level'){
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
                if(memberType == 'District Level'){
                    $('#branchRow').remove();
                }else if(memberType == 'Sub District Level'){
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
              if(userLevel == 'Sub District Level' && userRole == 'District Admin'){
                  alert('A sub district level user can not have a District Admin role! Please select again!');
                  $('#slctuserrole').val('');
              }else if(userLevel == 'District Level' && userRole == 'Sub District Admin'){
                  alert('A district level user can not have a Sub District Admin role! Please select again!');
                  $('#slctuserrole').val('');
              }
          }
        });

    });//end document.ready function
</script>
