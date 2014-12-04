<?php
	session_start();
	?>
	<h2>Form 3 Records</h2>
	<?php
	//get all form2 values created by the session owner user...
	require_once 'form3.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	//$form3List = getAllForm3sModifiedBy($_SESSION['LOGGED_USER_ID']);

	$form3List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			$form3List = getAllForm3ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
			$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
			if(!empty($userObj)){
				$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
				$form3List = getAllForm3ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
			}
	}
	if(!empty($form3List) && mysql_num_rows($form3List)){
?>
<table border="1" width="100%" rules="all">
	<tr style="background:#ccc">
		<td>Q3.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form3Row = mysql_fetch_object($form3List)){
			?>
			<tr>
				<td><?php echo stripslashes($form3Row->q3_1);?></td>
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
<?php
}else{
	?>
	<div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
	<?php
}
?>
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
