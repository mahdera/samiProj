<table border="0" width="100%">
	<tr>
		<td colspan="2" align="right">
			<img id="closeDetailId" src="../images/smallclose.png" alt="close" border="0" align="absmiddle"/>
		</td>
	</tr>
	<tr>
		<td align="right"><strong><span style="color:#59B">Enter your Email:</span></strong></td>
		<td>
			<input type="text" name="email" id="email" style="color:#59B"/>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input class="signin_submit" value="Continue" tabindex="6" type="button" id="onlyEmailEntered"/>
		</td>
	</tr>
</table>
<script type="text/javascript">
	$('#onlyEmailEntered').click(function(){
    disablePage('Checking our records...')
  	var email = $('#email').val();

  	if (email != "") {
  		$.ajax({
	        type:'GET',
	        data:null,
	        url:'CheckUserUsingEmailForgotUserId.php?email='+email,
	        success:function(data) {
            enablePage();
            // if html comes back take the whole div area otherwise its an info message
            if (data.indexOf('<') > -1 ) {
              setMessage(data);
            }
            else {
              setInfoMessage(data);
            }
	        }
    	});
  	}
  });

	$('#closeDetailId').click(function(){
		clearMessage();
	});
</script>
