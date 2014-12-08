<h1>Change User-Id</h1>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Enter Current User-Id:</td>
            <td>
                <input type="text" name="txtcurrentuserid" id="txtcurrentuserid"/>
            </td>
        </tr>
        <tr>
            <td>Enter New User-Id:</td>
            <td>
                <input type="text" name="txtnewuserid" id="txtnewuserid"/>
            </td>
        </tr>
        <tr>
            <td>Enter Your Password:</td>
            <td>
                <input type="password" name="txtpassword" id="txtpassword"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="btnchange"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnchange').click(function(){
            var currentUserId = $('#txtcurrentuserid').val();
            var newUserId = $('#txtnewuserid').val();
            var password = $('#txtpassword').val();


            if(currentUserId !== "" && newUserId !== "" && password !== ""){
                var dataString = "currentUserId="+currentUserId+"&newUserId="+newUserId+"&password="+password;
                $.ajax({
                    url: 'files/changeuserid.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#myAccountDiv').html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }

        });
    });//end document.ready function
</script>
