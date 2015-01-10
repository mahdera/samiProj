<?php
    //now search a user using the userId from the session and check if the user
    //is an admin or not and depending on the value the menu bar will change
    //accordingly...
    require_once 'files/user.php';
    require_once 'files/userlevellookup.php';
    require_once 'files/userrolelookup.php';
    require_once 'files/subdistrict.php';
    require_once 'files/userdistrict.php';
    require_once 'files/district.php';
    @session_start();

    $userObj = null;
    $fullName = null;
    $userLevelRow = null;
    $userRoleRow = null;
    $userLevel = null;
    $userRole = null;
    $districtId = null;

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $userRoleCode = $userObj->user_role;
    $divisionName = null;

    if($userRoleCode === '01A'){
      $districtId = getDistrictIdForUser($_SESSION['LOGGED_USER_ID']);
      $_SESSION['USER_ROLE_CODE'] = $userRoleCode;
      $districtObj = getDistrict($districtId);
      $divisionName = $districtObj->display_name;
    }

    if($userObj != null){
      $fullName = $userObj->first_name." ".$userObj->last_name;
      $userLevelRow = getUserLevelLookUpUsingCode($userObj->user_level);
      $userRoleRow = getUserRoleLookUpUsingCode($userObj->user_role);
      $userLevel = $userLevelRow->value;
      $userRole = $userRoleRow->value;
    }
    if($userObj->member_type == 'Admin'){
        ?>
            <div id="rightcontain">
                <div id="listdiv">
                    <ul class="ld">
                        <li><a href="#.php"><?php echo $fullName;?>, <?php echo $userRole . " - " . $userLevel;?> logged in</a></li>
                        <li><a href="#.php" id="accountManagementLink">My Account</a></li>
                        <li><a href="mycalendar.php">Calendar</a></li>
                        <li><a href="#" id="reportManagementLink">My Report</a></li>
                        <li><a href="#.php" id="contentManagementLink">Content</a></li>
                        <li><a href="#.php" id="userManagementLink">User</a></li>
                        <li><a href="#" id="logoutLink">Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php
    }else if($userObj->member_type == 'User' && ($userObj->user_role == '02A' || $userObj->user_role == '01A')){
        ?>
            <div id="rightcontain">
                <div id="listdiv" style="padding-botton: 5px;">
                    <ul class="ld">
                        <li><a href="#.php"><?php echo $fullName;?>, <?php echo $userRole . " - " . $userLevel;?> logged in</a></li>
                            <?php
                              if($userObj->user_role == '01A'){
                            ?>
                            <li>
                              <span id="subDistrictSelectionDiv">
                                <select name="slctsubdistrictselection" id="slctsubdistrictselection" style="width:15%">
                                  <option value="" selected="selected">--Select--</option>
                                </select>
                              </span>
                            </li>
                            <?php
                              }
                            ?>
                        <li><a href="#.php" id="accountManagementLink">My Account</a></li>
                        <li><a href="mycalendar.php">Calendar</a></li>
                        <li><a href="step1.php">Planning Process</a></li>
                        <li><a href="#" id="reportManagementLink">My Report</a></li>
                        <!--<li><a href="#.php" id="contentManagementLink">Content</a></li>-->
                        <li><a href="#.php" id="userManagementLink">User</a></li>
                        <li><a href="#.php" id="logoutLink">Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php
    }else{
        ?>
            <div id="rightcontain">
                <div id="listdiv">
                    <ul class="ld">
                        <li><a href="#.php"><?php echo $fullName;?>, <?php echo $userRole . " - " . $userLevel;?> logged in</a></li>
                        <li><a href="#.php" id="accountManagementLink">My Account</a></li>
                        <li><a href="mycalendar.php">Calendar</a></li>
                        <li><a href="step1.php">Planning Process</a></li>
                        <li><a href="#" id="reportManagementLink">My Report</a></li>
                        <li><a href="#" id="logoutLink">Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        //alert('here is the case...');
        //first load all the sub-districts available in the user's district
        var userRoleCode = "<?php echo $userRoleCode;?>";
        if(userRoleCode === '01A'){
          var districtId = "<?php echo $districtId;?>";
          $('#subDistrictSelectionDiv').load('files/showlistofsubdistrictsfoundinthisdistrict.php?districtId='+districtId, {noncache: new Date().getTime()});
        }

        $('#contentManagementLink').click(function(){
            $('.content').load('files/showcontentmanagementlist.php', {noncache: new Date().getTime()});
        });

        $('#userManagementLink').click(function(){
            $('.content').load('files/showusermanagementlist.php', {noncache: new Date().getTime()});
        });

        $('#accountManagementLink').click(function(){
            $('.content').load('files/showmyaccountinnermenu.php', {noncache: new Date().getTime()});
        });

        $('#reportManagementLink').click(function(){
            $('.content').load('files/showreportmanagementpage.php', {noncache: new Date().getTime()});
        });

        $('#logoutLink').click(function(){
            var txt = 'Are you sure you want to logout?';

            $.prompt(txt,{
        					buttons:{"Logout":true, "Cancel":false},
        					close: function(e,v,m,f){

        						if(v){
        							    $.ajax({
                              url: 'logout.php',
                              data: null,
                              type:'POST',
                              success:function(response){
                                  window.location = 'login.php';
                              },
                              error:function(error){
                                  alert(error);
                              }
                          });
        						}
        						else{}
        					}
	           });

        });

    });//end document.ready function
</script>
