<h1>Change Password</h1>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Enter User-Id:</td>
            <td>
                <input type="text" name="txtuserid" id="txtuserid"/>
            </td>
        </tr>
        <tr>
            <td>Enter Current Password:</td>
            <td>
                <input type="text" name="txtcurrentpassword" id="txtcurrentpassword"/>
            </td>
        </tr>
        <tr>
            <td>Enter New Password:</td>
            <td>
                <input type="password" name="txtnewpassword" id="txtnewpassword"/>
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
        //myAccountDiv
        $('#btnchange').click(function(){
            alert('Code to change password goes here...');
        });
    });//end document.ready function
</script>