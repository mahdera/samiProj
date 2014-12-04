<?php
    $id = $_GET['id'];
    //now get the user record from the database
    require_once 'user.php';
    $userObj = getUser($id);
?>
<hr/>
<h1>Reset User Password</h1>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Enter Password:</td>
            <td>
                <input type="password" name="txtresetpassword" id="txtresetpassword"/>
            </td>
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td>
                <input type="password" name="txtresetconfirmpassword" id="txtresetconfirmpassword"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Reset User Password" id="btnresetpassword"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnresetpassword').click(function(){
            //now get the values...
            var id = "<?php echo $id;?>";
            var resetPassword = $('#txtresetpassword').val();
            var resetConfirmPassword = $('#txtresetconfirmpassword').val();
            if(resetPassword !== "" && resetConfirmPassword !== ""){
                if(resetPassword === resetConfirmPassword){
                    //now i can reset the user's password
                    var dataString = "id="+id+"&resetPassword="+resetPassword;
                    $.ajax({
                        url: 'files/resetuserpassword.php',
                        data: dataString,
                        type:'POST',
                        success:function(response){
                            $('#createUserDiv').html(response);
                        },
                        error:function(error){
                            alert(error);
                        }
                    });
                }else{
                    alert("Please enter identical value for both password and confirm password boxes. Try again!");
                }
            }else{
                alert('Password value or confirm password value left empty. Try again!');
            }
        });
    });//end document.ready function
</script>
