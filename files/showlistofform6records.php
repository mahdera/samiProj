<?php
	session_start();
	?>
	<h2>Form 6 Records</h2>
	<?php
	//get all form2 values created by the session owner user...
	require_once 'form6.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$form6List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		//$form6List = getAllForm6ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		$form6List = getLatestForm6ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			//$form6List = getAllForm6ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
			$form6List = getLatestForm6ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
		}
	}
	//$form6List = getAllForm6sModifiedBy($_SESSION['LOGGED_USER_ID']);
	if(!empty($form6List) && mysql_num_rows($form6List)){
?>
<table border="1" width="100%" rules="all">
	<tr style="background:#ccc">
		<td>Q6.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form6Row = mysql_fetch_object($form6List)){
			?>
			<tr>
				<td><?php echo stripslashes($form6Row->q6_1);?></td>
				<td align="middle">
					<a href="#.php" class="form6EditLink" id="<?php echo $form6Row->id;?>">Edit</a>
				</td>
				<td align="middle">
					<a href="#.php" class="form6DeleteLink" id="<?php echo $form6Row->id;?>">Delete</a>
				</td>
			</tr>
			<?php
				$divId = "form6EditDiv" . $form6Row->id;
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
		$('.form6EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form6EditDiv" + id;
			$('#'+divId).load('files/showform6editfields.php?id='+id);
		});

		$('.form6DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this record?')){
				var id = $(this).attr('id');
				//$('#form6ManagementDetailDiv').load('files/deletethisform6.php?id='+id);
				dataString = "id="+id;
				$.ajax({
					url: 'files/deletethisform6.php',
					data: dataString,
					type:'GET',
					success:function(response){
						$('#form6Div').html(response);
					},
					error:function(error){
						alert(error);
					}
				});
			}
		});
	});//end document.ready function
</script>
