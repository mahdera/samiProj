<?php
	session_start();
	?>
	<h2>Form 9 Records</h2>
	<?php
	//get all form2 values created by the session owner user...
	require_once 'form9.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$form9List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$form9List = getAllForm9ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			$form9List = getAllForm9ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		}
	}
	//$form9List = getAllForm9sModifiedBy($_SESSION['LOGGED_USER_ID']);
	if(!empty($form9List) && mysql_num_rows($form9List)){
?>
<table border="1" width="100%" rules="all">
	<tr style="background:#ccc">
		<td>Q9.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form9Row = mysql_fetch_object($form9List)){
			?>
			<tr>
				<td><?php echo stripslashes($form9Row->q9_1);?></td>
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
<?php
}else{
	?>
	<div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
	<?php
}
?>
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
