<form>
    <table border="0" width="100%">
        <tr>
            <td><a href="#.php" id="changeMyUserIdLink">Change My User Id</a></td>
            <td><a href="#.php" id="changeMyPasswordLink">Change My Password</a></td>            
        </tr>
    </table>
</form>
<div id="myAccountDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#changeMyUserIdLink').click(function(){
            $('#myAccountDiv').load('files/showchangeuseridform.php');
        });
        
        $('#changeMyPasswordLink').click(function(){
            $('#myAccountDiv').load('files/showchangepasswordform.php');
        });
        
    });//end document.ready function
</script>
