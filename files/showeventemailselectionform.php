<?php
	require_once 'user.php';
	//now i need to get all approved users' from the database
	$userList = getAllApprovedUsers();
?>
<center>
	<form>
		<table border="0" width="78%">
			<tr style="background:#eee">
				<td>Select</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Email</td>
				<td>Phone Number</td>
				<td>Member Type</td>
			</tr>
			<?php
				while($userRow = mysql_fetch_object($userList)){
					?>
						<tr>
							<td>
								<input type="checkbox" name="chkuser"  class="checkBoxSelection" value="<?php echo $userRow->email;?>"/>
							</td>
							<td><?php echo $userRow->first_name;?></td>
							<td><?php echo $userRow->last_name;?></td>
							<td><?php echo $userRow->email;?></td>
							<td><?php echo $userRow->phone_number;?></td>
							<td><?php echo $userRow->member_type;?></td>
						</tr>
					<?php
				}//end while loop
			?>
			<tr>
				<td colspan="6">
					Your Message:
					<textarea name="textareashare" id="textareashare" style="width:100%" rows="4"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="6" align="right">
					<input type="button" value="Send" id="btnsendeventemail"/>
				</td>
			</tr>
		</table>
	</form>
</center>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnsendeventemail').click(function(){
			var selectedCheckBoxesIdDataString = "";
                var ctr = 1;
                $('input:checkbox.checkBoxSelection').each(function () {
                    var checkBoxName = "thCheckBox" + ctr;
                    if( this.checked ){
                        selectedCheckBoxesIdDataString += checkBoxName +"="+ $(this).val()+"&";
                        ctr++;
                    }
                });
                selectedCheckBoxesIdDataString+="ctr="+(ctr-1);
                if(ctr === 1){
                    alert("You need to select at least one th value!");
                }else{                    
                	var message = $('#textareashare').val();
                    var dataString = selectedCheckBoxesIdDataString+"&message="+message;
                    $.ajax({
		                url: 'files/sendemailtoselectedusers.php',		
		                data: dataString,
		                type:'POST',
		                success:function(response){                    
		                    $('#shareEventDiv').html(response);
		                },
		                error:function(error){
		                    alert(error);
		                }
		            });
                }
		});
	});//end document.ready function
</script>