<?php
	session_start();
	?>
	<h2>Form 1 Records</h2>
	<?php
	require_once 'form1.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	//$form1List = getAllForm1sModifiedBy($_SESSION['LOGGED_USER_ID']);

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		//$form1List = getAllForm1ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		$form1List = getLatestForm1ModifiedByUserUsingLevelResultSet('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			//$form1List = getAllForm1ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
			$form1List = getLatestForm1ModifiedByUserUsingLevelResultSet('02', $userSubDistrictObj->sub_district_id);
		}
	}
if(!empty($form1List) && mysql_num_rows($form1List)){
?>
<table border="1" width="100%" rules="all">
	<tr style="background:#ccc">
		<td>Title</td>
		<td>Date</td>
		<td>Plan</td>
		<td>Q1</td>
		<td>Q2</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form1Row = mysql_fetch_object($form1List)){
			?>
			<tr>
				<td><?php echo stripslashes($form1Row->title);?></td>
				<td><?php echo stripslashes($form1Row->form_date);?></td>
				<td><?php echo stripslashes($form1Row->plan);?></td>
				<td><?php echo stripslashes($form1Row->q1);?></td>
				<td><?php echo stripslashes($form1Row->q2);?></td>
				<td align="middle">
					<a href="#.php" class="form1EditLink" id="<?php echo $form1Row->id;?>">Edit</a>
				</td>
				<td align="middle">
					<a href="#.php" class="form1DeleteLink" id="<?php echo $form1Row->id;?>">Delete</a>
				</td>
			</tr>
			<?php
				$divId = "form1EditDiv" . $form1Row->id;
			?>
			<tr>
				<td colspan="7">
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
		$('.form1EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form1EditDiv" + id;
			$('#'+divId).load('files/showform1editfields.php?id='+id);
		});

		$('.form1DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this record?')){
				var id = $(this).attr('id');
				$('#form1ManagementDetailDiv').load('files/deletethisform1.php?id='+id);
			}
		});
	});//end document.ready function
</script>
