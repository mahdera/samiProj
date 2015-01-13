<form>
    <table border="0" width="100%">
        <tr style="background:#eee;font-weight:bolder;">
            <td><a href="#.php" id="changeMyUserIdLink">Change My User Id</a></td>
            <td><a href="#.php" id="changeMyPasswordLink">Change My Password</a></td>
        </tr>
    </table>
</form>
<div id="myAccountDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){

        $('#changeMyUserIdLink').click(function(){
            $('#myAccountDiv').load('files/showchangeuseridform.php',{noncache: new Date().getTime()});
        });

        $('#changeMyPasswordLink').click(function(){
            $('#myAccountDiv').load('files/showchangepasswordform.php',{noncache: new Date().getTime()});
        });

    });//end document.ready function
</script>
