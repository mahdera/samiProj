<?php
    session_start();
    require_once 'user.php';
    require_once 'zone.php';
    require_once 'branch.php';
    require_once 'userzone.php';
    require_once 'userbranch.php';
    $theUserId = $_SESSION['INDIVIDUAL_INT_USER_ID'];
    $loggedInUserObj = getUser($theUserId);
    $userList = null;
    if($loggedInUserObj->member_type == 'Admin'){
        $userList = getAllNonAdminUsers();
    }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == 'Branch Admin'){
        //now get the branch id of the logged in user
        $userBranchObj = getBranchInfoForUser($theUserId);
        $userList = getAllBranchUsersWithBranchId($userBranchObj->branch_id);
    }else if($loggedInUserObj->member_type == 'User' && $loggedInUserObj->user_role == 'Zone Admin'){
        //now get the zone id of the logged in user and get all zone and branch level users found under the zone id of this logged in user
        $userZoneObj = getZoneInfoForUser($theUserId);
        $userList = getAllZoneAndBranchUsersWithZoneId($userZoneObj->zone_id);
    }
?>
<form>
    <div>
        <?php
          if($loggedInUserObj->member_type == 'Admin'){
            ?>
              <a href="#.php" id="createUserLink">Create User</a> |
              <a href="#.php" id="zoneManagementLink">Zone Management</a> |
              <a href="#.php" id="branchManagementLink">Branch Management</a>
            <?php
          }else{
            ?>
              <a href="#.php" id="createUserLink">Create User</a>
            <?php
          }
        ?>
    </div>
    <table border="0" width="100%">
        <tr style="background: #eee">
            <td>Ser.No</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>User Id</td>
            <td>Member Type</td>
            <td>Member Status</td>
            <td>User Level</td>
            <td>User Role</td>
            <td>Zone</td>
            <td>Branch</td>
            <td>Modification Date</td>
            <td>Reset Password</td>
            <td>Modify Status</td>
        </tr>
        <?php
            $ctr=1;
            while($userRow = mysql_fetch_object($userList)){
                $zoneObj = null;
                $branchObj = null;
                if($userRow->user_level == 'Zone Level'){
                    //fetch zone information from tbl_user_zone
                    $userZone = getZoneInfoForUser($userRow->id);
                    $zoneObj = getZone($userZone->zone_id);
                }else if($userRow->user_level == 'Branch Level'){
                    //fetch branch information from tbl_user_branch
                    $userBranch = getBranchInfoForUser($userRow->id);
                    $branchObj = getBranch($userBranch->branch_id);
                    $zoneObj = getZone($branchObj->zone_id);
                }
                ?>
                <tr>
                    <td><?php echo $ctr++;?></td>
                    <td><?php echo $userRow->first_name;?></td>
                    <td><?php echo $userRow->last_name;?></td>
                    <td><?php echo $userRow->email;?></td>
                    <td><?php echo $userRow->user_id;?></td>
                    <td><?php echo $userRow->member_type;?></td>
                    <td><?php echo $userRow->user_status;?></td>
                    <td><?php echo ($userRow->user_level != null ? $userRow->user_level : '---');?></td>
                    <td><?php echo ($userRow->user_role != null ? $userRow->user_role : '---');?></td>
                    <td><?php echo ($zoneObj != null ? $zoneObj->zone_name : '---');?></td>
                    <td><?php echo ($branchObj != null ? $branchObj->branch_name : '---');?></td>
                    <td><?php echo $userRow->modification_date;?></td>
                    <td>
                        <a href="#.php" class="resetUserPasswordLink" id="<?php echo $userRow->id;?>">Reset Password</a>
                    </td>
                    <td>
                        <a href="#.php" class="modifyUserProfileLink" id="<?php echo $userRow->id;?>">Modify Profile</a>
                    </td>
                </tr>
                <?php
            }//end while loop
        ?>
    </table>
</form>
<div id="createUserDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#createUserLink').click(function(){
            $('#createUserDiv').load('files/showcreateuserform.php');
        });

        $('.resetUserPasswordLink').click(function(){
            var id = $(this).attr('id');
            $('#createUserDiv').load('files/showresetuserpasswordform.php?id='+id);
        });

        $('.modifyUserProfileLink').click(function(){
            var id = $(this).attr('id');
            $('#createUserDiv').load('files/showmodifyuserprofileform.php?id='+id);
        });

        $('#zoneManagementLink').click(function(){
            $('#createUserDiv').load('files/showzonemanagementmenu.php');
        });

        $('#branchManagementLink').click(function(){
            $('#createUserDiv').load('files/showbranchmanagementmenu.php');
        });
    });//end document.ready function
</script>
