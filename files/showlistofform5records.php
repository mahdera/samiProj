<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form5.php';
	$form5List = getAllForm5sModifiedBy($_SESSION['LOGGED_USER_ID']);	
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q5.1</td>		
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form5Row = mysql_fetch_object($form5List)){
			?>
			<tr>
				<td><?php echo $form5Row->q5_1;?></td>				
				<td>
					<a href="#.php" class="form5EditLink" id="<?php echo $form5Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form5DeleteLink" id="<?php echo $form5Row->id;?>">Delete</a>	
				</td>
			</tr>
			<?php
				$divId = "form5EditDiv" . $form5Row->id;
			?>
			<tr>
				<td colspan="3">
					<div id="<?php echo $divId;?>"></div>
				</td>
			</tr>
			<?php
		}//end while loop
	?>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('.form5EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form5EditDiv" + id;
			$('#'+divId).load('files/showform5editfields.php?id='+id);
		});

		$('.form5DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form5 record?')){
				var id = $(this).attr('id');
				$('#form5ManagementDetailDiv').load('files/deletethisform5.php?id='+id);
			}
		});
	});//end document.ready function
</script>