<?php
	session_start();
	?>
	<h2>Form 4 Records</h2>
	<?php
	//get all form2 values created by the session owner user...
	require_once 'form4.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	//$form4List = getAllForm4sModifiedBy($_SESSION['LOGGED_USER_ID']);
	$form4List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$form4List = getAllForm4ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(isset($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			$form4List = getAllForm4ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		}
	}
	if(isset($form4List) && mysql_num_rows($form4List)){
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
				<td><?php echo stripslashes($form4Row->q4_1);?></td>
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
<?php
}else{
	?>
	<div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
	<?php
}
?>
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
