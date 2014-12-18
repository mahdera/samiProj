<?php
	session_start();
	?>
	<h2>Form 10 Records</h2>
	<?php
	//get all form2 values created by the session owner user...
	require_once 'form10.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$form10List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$form10List = getAllForm10ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			$form10List = getAllForm10ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		}
	}
	//$form10List = getAllForm10sModifiedBy($_SESSION['LOGGED_USER_ID']);
	if(!empty($form10List) && mysql_num_rows($form10List)){
?>
<table border="1" width="100%" rules="all">
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
				<td align="middle">
					<a href="#.php" class="form10EditLink" id="<?php echo $form10Row->id;?>"><img src="images/edit.png" border="0" align="absmiddle"/></a>
				</td>
				<td align="middle">
					<a href="#.php" class="form10DeleteLink" id="<?php echo $form10Row->id;?>"><img src="images/delete.png" border="0" align="absmiddle"/></a>
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
<?php
}else{
	?>
	<div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
	<?php
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.form10EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form10EditDiv" + id;
			$('#'+divId).load('files/showform10editfields.php?id='+id);
		});

		$('.form10DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this record?')){
				var id = $(this).attr('id');
				$('#form10ManagementDetailDiv').load('files/deletethisform10.php?id='+id);
			}
		});
	});//end document.ready function
</script>
