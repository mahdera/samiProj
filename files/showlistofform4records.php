<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form4.php';
	$form4List = getAllForm4sModifiedBy($_SESSION['LOGGED_USER_ID']);	
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q4.1</td>		
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form4Row = mysql_fetch_object($form4List)){
			?>
			<tr>
				<td><?php echo $form4Row->q4_1;?></td>				
				<td>
					<a href="#.php" class="form4EditLink" id="<?php echo $form4Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form4DeleteLink" id="<?php echo $form4Row->id;?>">Delete</a>	
				</td>
			</tr>
			<?php
				$divId = "form4EditDiv" . $form4Row->id;
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
		$('.form4EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form4EditDiv" + id;
			$('#'+divId).load('files/showform4editfields.php?id='+id);
		});

		$('.form4DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form4 record?')){
				var id = $(this).attr('id');
				$('#form4ManagementDetailDiv').load('files/deletethisform4.php?id='+id);
			}
		});
	});//end document.ready function
</script>