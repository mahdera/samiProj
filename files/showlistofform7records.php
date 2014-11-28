<?php
	session_start();
	//get all form2 values created by the session owner user...
	require_once 'form7.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$form7List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$form7List = getAllForm7ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$form7List = getAllForm7ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}
	//$form7List = getAllForm7sModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
	<tr style="background:#ccc">
		<td>Q7.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form7Row = mysql_fetch_object($form7List)){
			?>
			<tr>
				<td><?php echo $form7Row->q7_1;?></td>
				<td>
					<a href="#.php" class="form7EditLink" id="<?php echo $form7Row->id;?>">Edit</a>
				</td>
				<td>
					<a href="#.php" class="form7DeleteLink" id="<?php echo $form7Row->id;?>">Delete</a>
				</td>
			</tr>
			<?php
				$divId = "form7EditDiv" . $form7Row->id;
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
		$('.form7EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form7EditDiv" + id;
			$('#'+divId).load('files/showform7editfields.php?id='+id);
		});

		$('.form7DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form7 record?')){
				var id = $(this).attr('id');
				$('#form7ManagementDetailDiv').load('files/deletethisform7.php?id='+id);
			}
		});
	});//end document.ready function
</script>
