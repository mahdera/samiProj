<?php
	session_start();
	?>
	<h2>Form 8 Records</h2>
	<?php
	//get all form2 values created by the session owner user...
	require_once 'form8.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$form8List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$form8List = getAllForm8ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			$form8List = getAllForm8ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		}
	}
	//$form8List = getAllForm8sModifiedBy($_SESSION['LOGGED_USER_ID']);
	if(!empty($form8List) && mysql_num_rows($form8List)){
?>
<table border="1" width="100%" rules="all">
	<tr style="background:#ccc">
		<td>Q8.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form8Row = mysql_fetch_object($form8List)){
			?>
			<tr>
				<td><?php echo stripslashes($form8Row->q8_1);?></td>
				<td align="middle">
					<a href="#.php" class="form8EditLink" id="<?php echo $form8Row->id;?>"><img src="images/edit.png" border="0" align="absmiddle"/></a>
				</td>
				<td align="middle">
					<a href="#.php" class="form8DeleteLink" id="<?php echo $form8Row->id;?>"><img src="images/delete.png" border="0" align="absmiddle"/></a>
				</td>
			</tr>
			<?php
				$divId = "form8EditDiv" . $form8Row->id;
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
		$('.form8EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form8EditDiv" + id;
			$('#'+divId).load('files/showform8editfields.php?id='+id);
		});

		$('.form8DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this form8 record?')){
				var id = $(this).attr('id');
				$('#form8ManagementDetailDiv').load('files/deletethisform8.php?id='+id);
			}
		});
	});//end document.ready function
</script>
