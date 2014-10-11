<?php
    $id = $_GET['id'];
    require_once 'user.php';
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
            <td>User Status:</td>
            <td>
                <select name="slctedituserstatus" id="slctedituserstatus" style="width: 100%">
                    <?php
                        if($userObj->user_status === "Active"){
                            ?>
                                <option value="Active" selected="selected">Active</option>
                                <option value="Blocked">Blocked</option>
                            <?php
                        }else if($userObj->user_status === "Blocked"){
                            ?>
                                <option value="Active">Active</option>
                                <option value="Blocked" selected="selected">Blocked</option>
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
            <td>Phone Number:</td>
            <td>
                <input type="text" name="txteditphonenumber" id="txteditphonenumber" value="<?php echo $userObj->phone_number;?>"/>
            </td>
        </tr>        
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
            
            if(firstName !== "" && lastName !== "" && email !== "" && memberType !== "" &&
                    userStatus !== ""){
                var dataString = "id="+id+"&firstName="+firstName+"&lastName="+lastName+"&email="+email+
                        "&memberType="+memberType+"&userStatus="+userStatus+"&phoneNumber="+phoneNumber;
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
    });//end document.ready function
</script>
