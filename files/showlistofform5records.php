<?php
	session_start();
	?>
	<h2>Form 5 Records</h2>
	<?php
	//get all form2 values created by the session owner user...
	require_once 'form5.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';


	//$form5List = getAllForm5sModifiedBy($_SESSION['LOGGED_USER_ID']);
	$form5List = null;
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		//$form5List = getAllForm5ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		$form5List = getLatestForm5ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			//$form5List = getAllForm5ModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
			$form5List = getLatestForm5ModifiedByUsingUserLevelResultSet('02', $userSubDistrictObj->sub_district_id);
		}
	}
	if(!empty($form5List) && mysql_num_rows($form5List)){
?>
<table border="1" width="100%" rules="all">
	<tr style="background:#ccc">
		<td>Q5.1</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
		while($form5Row = mysql_fetch_object($form5List)){
			?>
			<tr>
				<td><?php echo stripslashes($form5Row->q5_1);?></td>
				<td align="middle">
					<a href="#.php" class="form5EditLink" id="<?php echo $form5Row->id;?>">Edit</a>
				</td>
				<td align="middle">
					<a href="#.php" class="form5DeleteLink" id="<?php echo $form5Row->id;?>">Delete</a>
				</td>
			</tr>
			<?php
				$divId = "form5EditDiv" . $form5Row->id;
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
		$('.form5EditLink').click(function(){
			var id = $(this).attr('id');
			var divId = "form5EditDiv" + id;
			$('#'+divId).load('files/showform5editfields.php?id='+id);
		});

		$('.form5DeleteLink').click(function(){
			if(window.confirm('Are you sure you want to delete this record?')){
				var id = $(this).attr('id');
				//$('#form5ManagementDetailDiv').load('files/deletethisform5.php?id='+id);
				dataString = "id="+id;
				$.ajax({
					url: 'files/deletethisform5.php',
					data: dataString,
					type:'GET',
					success:function(response){
						$('#form5Div').html(response);
					},
					error:function(error){
						alert(error);
					}
				});
			}
		});
	});//end document.ready function
</script>
