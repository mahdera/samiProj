<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form6.php';
	$form6List = getAllForm6sModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q6.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form6Row = mysql_fetch_object($form6List)){
			?>
			<tr>
				<td><?php echo $form6Row->q6_1;?></td>
				<td>
					<a href="#.php" class="form6EditLink" id="<?php echo $form6Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form6DeleteLink" id="<?php echo $form6Row->id;?>">Delete</a>
				</td>
			</tr>
			<?php
				$divId = "form6EditDiv" . $form6Row->id;
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
		$('.form6EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form6EditDiv" + id;
			$('#'+divId).load('files/showform6editfields.php?id='+id);
		});

		$('.form6DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form6 record?')){
				var id = $(this).attr('id');
				$('#form6ManagementDetailDiv').load('files/deletethisform6.php?id='+id);
			}
		});
	});//end document.ready function
</script>
