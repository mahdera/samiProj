<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form3.php';
	$form3List = getAllForm3sModifiedBy($_SESSION['LOGGED_USER_ID']);	
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q3.1</td>		
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form3Row = mysql_fetch_object($form3List)){
			?>
			<tr>
				<td><?php echo $form3Row->q3_1;?></td>				
				<td>
					<a href="#.php" class="form3EditLink" id="<?php echo $form3Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form3DeleteLink" id="<?php echo $form3Row->id;?>">Delete</a>	
				</td>
			</tr>
			<?php
				$divId = "form3EditDiv" . $form3Row->id;
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
		$('.form3EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form3EditDiv" + id;
			$('#'+divId).load('files/showform3editfields.php?id='+id);
		});

		$('.form3DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form3 record?')){
				var id = $(this).attr('id');
				$('#form3ManagementDetailDiv').load('files/deletethisform3.php?id='+id);
			}
		});
	});//end document.ready function
</script>