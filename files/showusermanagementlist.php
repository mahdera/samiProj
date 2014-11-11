<?php
    require_once 'user.php';
    //get all non-admin users
    $userList = getAllNonAdminUsers();
?>
<form>
    <div>
        <a href="#.php" id="createUserLink">Create User</a> |
        <a href="#.php" id="zoneManagementLink">Zone Management</a> |
        <a href="#.php" id="branchManagementLink">Branch Management</a>
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
            <td>Modification Date</td>
            <td>Reset Password</td>
            <td>Modify Status</td>
        </tr>
        <?php
            $ctr=1;
            while($userRow = mysql_fetch_object($userList)){
                ?>
                <tr>
                    <td><?php echo $ctr++;?></td>
                    <td><?php echo $userRow->first_name;?></td>
                    <td><?php echo $userRow->last_name;?></td>
                    <td><?php echo $userRow->email;?></td>
                    <td><?php echo $userRow->user_id;?></td>
                    <td><?php echo $userRow->member_type;?></td>
                    <td><?php echo $userRow->user_status;?></td>
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
