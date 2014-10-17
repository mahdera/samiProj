<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form2.php';
	$form2List = getAllForm2sModifiedBy($_SESSION['LOGGED_USER_ID']);	
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q2.1</td>
		<td>Q2.2</td>
		<td>Q2.3</td>
		<td>Q2.4</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form2Row = mysql_fetch_object($form2List)){
			?>
			<tr>
				<td><?php echo $form2Row->q2_1;?></td>
				<td><?php echo $form2Row->q2_2;?></td>
				<td><?php echo $form2Row->q2_3;?></td>
				<td><?php echo $form2Row->q2_4;?></td>
				<td>
					<a href="#.php" class="form2EditLink" id="<?php echo $form2Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form2DeleteLink" id="<?php echo $form2Row->id;?>">Delete</a>	
				</td>
			</tr>
			<?php
				$divId = "form2EditDiv" . $form2Row->id;
			?>
			<tr>
				<td colspan="6">
					<div id="<?php echo $divId;?>"></div>
				</td>
			</tr>
			<?php
		}//end while loop
	?>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('.form2EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form2EditDiv" + id;
			$('#'+divId).load('files/showform2editfields.php?id='+id);
		});

		$('.form2DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form2 record?')){
				var id = $(this).attr('id');
				$('#form2ManagementDetailDiv').load('files/deletethisform2.php?id='+id);
			}
		});
	});//end document.ready function
</script>