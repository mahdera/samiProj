<?php    
    //now search a user using the userId from the session and check if the user
    //is an admin or not and depending on the value the menu bar will change
    //accordingly...
    require_once 'files/user.php';
    $userObj = getUserUsingUserId($_SESSION['USER_ID']);   
    $fullName = $userObj->first_name." ".$userObj->last_name; 
    if($userObj->member_type == 'Admin'){
        ?>
            <div id="rightcontain">
                <div id="listdiv">
                    <ul class="ld">                        
                        <li><a href="#.php" id="accountManagementLink">My Account</a></li>
                        <li><a href="mycalendar.php">Calendar</a></li>
                        <li><a href="#">Process</a></li>
                        <li><a href="#">My Report</a></li>
                        <li><a href="#.php" id="contentManagementLink">Content</a></li>
                        <li><a href="#.php" id="userManagementLink">User</a></li>                        
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php
    }else{
        ?>
            <div id="rightcontain">
                <div id="listdiv">
                    <ul class="ld">
                        <li><a href="#.php" id="accountManagementLink">My Account</a></li>
                        <li><a href="mycalendar.php">Calendar</a></li>
                        <li><a href="step1.php">Process</a></li>
                        <li><a href="#">My Report</a></li>
                        <li><a href="logout.php">Logout</a></li>
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
    });//end document.ready function
</script>