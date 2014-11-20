<?php
    //now search a user using the userId from the session and check if the user
    //is an admin or not and depending on the value the menu bar will change
    //accordingly...
    require_once 'files/user.php';
    $userObj = getUserUsingUserId($_SESSION['USER_ID']);
    $fullName = $userObj->first_name." ".$userObj->last_name;
    $userLevel = $userObj->user_level;
    $userRole = $userObj->user_role;
    if($userObj->member_type == 'Admin'){
        ?>
            <div id="rightcontain">
                <div id="listdiv">
                    <ul class="ld">
                        <li><a href="#.php"><?php echo $fullName;?> logged in</a></li>
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
    }else if($userObj->member_type == 'User' && ($userObj->user_role == 'Sub District Admin' || $userObj->user_role == 'District Admin')){
        ?>
            <div id="rightcontain">
                <div id="listdiv">
                    <ul class="ld">
                        <li><a href="#.php"><?php echo $fullName;?> logged in</a></li>
                        <li><a href="#.php" id="accountManagementLink">My Account</a></li>
                        <li><a href="mycalendar.php">Calendar</a></li>
                        <li><a href="step1.php">Process</a></li>
                        <li><a href="#" id="reportManagementLink">My Report</a></li>
                        <!--<li><a href="#.php" id="contentManagementLink">Content</a></li>-->
                        <li><a href="#.php" id="userManagementLink">User</a></li>
                        <li><a href="#" id="logoutLink">Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php
    }else{
        ?>
            <div id="rightcontain">
                <div id="listdiv">
                    <ul class="ld">
                        <li><a href="#.php"><?php echo $fullName;?> logged in</a></li>
                        <li><a href="#.php" id="accountManagementLink">My Account</a></li>
                        <li><a href="mycalendar.php">Calendar</a></li>
                        <li><a href="step1.php">Process</a></li>
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
        $('#contentManagementLink').click(function(){
            $('.content').load('files/showcontentmanagementlist.php');
        });

        $('#userManagementLink').click(function(){
            $('.content').load('files/showusermanagementlist.php');
        });

        $('#accountManagementLink').click(function(){
            $('.content').load('files/showmyaccountinnermenu.php');
        });

        $('#reportManagementLink').click(function(){
            $('.content').load('files/showreportmanagementpage.php');
        });

        $('#logoutLink').click(function(){
            var txt = 'Are you sure you want to logout?';

            $.prompt(txt,{
        					buttons:{Logout:true, Cancel:false},
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

            /*if(window.confirm('Are you sure you want to logout?')){
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
            }*/
        });

    });//end document.ready function
</script>
