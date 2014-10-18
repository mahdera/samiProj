<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form9.php';
	$form9List = getAllForm9sModifiedBy($_SESSION['LOGGED_USER_ID']);	
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q9.1</td>		
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form9Row = mysql_fetch_object($form9List)){
			?>
			<tr>
				<td><?php echo $form9Row->q9_1;?></td>				
				<td>
					<a href="#.php" class="form9EditLink" id="<?php echo $form9Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form9DeleteLink" id="<?php echo $form9Row->id;?>">Delete</a>	
				</td>
			</tr>
			<?php
				$divId = "form9EditDiv" . $form9Row->id;
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
		$('.form9EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form9EditDiv" + id;
			$('#'+divId).load('files/showform9editfields.php?id='+id);
		});

		$('.form9DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form9 record?')){
				var id = $(this).attr('id');
				$('#form9ManagementDetailDiv').load('files/deletethisform9.php?id='+id);
			}
		});
	});//end document.ready function
</script>