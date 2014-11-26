<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form10.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$form10List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$form10List = getAllForm10ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}
	//$form10List = getAllForm10sModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q10.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form10Row = mysql_fetch_object($form10List)){
			?>
			<tr>
				<td><?php echo $form10Row->q10_1;?></td>
				<td>
					<a href="#.php" class="form10EditLink" id="<?php echo $form10Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form10DeleteLink" id="<?php echo $form10Row->id;?>">Delete</a>
				</td>
			</tr>
			<?php
				$divId = "form10EditDiv" . $form10Row->id;
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
		$('.form10EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form10EditDiv" + id;
			$('#'+divId).load('files/showform10editfields.php?id='+id);
		});

		$('.form10DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form10 record?')){
				var id = $(this).attr('id');
				$('#form10ManagementDetailDiv').load('files/deletethisform10.php?id='+id);
			}
		});
	});//end document.ready function
</script>
