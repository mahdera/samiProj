<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form8.php';
	$form8List = getAllForm8sModifiedBy($_SESSION['LOGGED_USER_ID']);	
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q8.1</td>		
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form8Row = mysql_fetch_object($form8List)){
			?>
			<tr>
				<td><?php echo $form8Row->q8_1;?></td>				
				<td>
					<a href="#.php" class="form8EditLink" id="<?php echo $form8Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form8DeleteLink" id="<?php echo $form8Row->id;?>">Delete</a>	
				</td>
			</tr>
			<?php
				$divId = "form8EditDiv" . $form8Row->id;
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
		$('.form8EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form8EditDiv" + id;
			$('#'+divId).load('files/showform8editfields.php?id='+id);
		});

		$('.form8DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form8 record?')){
				var id = $(this).attr('id');
				$('#form8ManagementDetailDiv').load('files/deletethisform8.php?id='+id);
			}
		});
	});//end document.ready function
</script>