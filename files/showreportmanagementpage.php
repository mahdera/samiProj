<?php
@session_start();
if(empty($_SESSION['USER_ID'])){
	header("Location: login.php");
}

if($_SESSION['USER_ROLE_CODE'] === '01A'){
	if(empty($_SESSION['SUB_DISTRICT_ID'])){
		header("Location: nosubdistrictselected.php");
	}
}
?>
<?php
	require_once 'goalfirst.php';
	require_once 'th.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';
	require_once 'uploadeddocument.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	$goalFirstList = null;
	$uploadedDocResult = null;

	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$goalFirstList = getAllGoalFirstsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		$uploadedDocResult = getAllUploadedDocumentsForSubDistrict($userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObject)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
			$uploadedDocResult = getAllUploadedDocumentsForSubDistrict($_SESSION['SUB_DISTRICT_ID']);
			$goalFirstList = getAllGoalFirstsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		}
	}

	$uploadedDocResult = getAllUploadedDocuments();
	if( !empty($uploadedDocResult) ){
		?>
		<h2>Downloads</h2>
		<table border="0" width="100%">
			<tr style="background: #eee">
				<td>Thumbnail</td>
				<td>File Name</td>
				<td>Upload Date</td>
				<td>Download</td>
			</tr>
			<?php
				while($uploadedDocRow = mysql_fetch_object($uploadedDocResult)){
					$pathVar = "files/uploaded_files/thumbnail/" . $uploadedDocRow->file_name;
					$imgPathVar = "files/uploaded_files/" . $uploadedDocRow->file_name;
					?>
						<tr>
							<td><img src="<?php echo $pathVar;?>" border="0" align="absmiddle"/></td>
							<td><?php echo $uploadedDocRow->file_name;?></td>
							<td><?php echo $uploadedDocRow->upload_date;?></td>
							<td><a href="<?php echo $imgPathVar;?>">Download</a></td>
						</tr>
					<?php
				}//end while loop
			?>
		</table>
		<?php
	}


	//$goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
	$loggedInUserObj = getUserUsingTheUserId($_SESSION['LOGGED_USER_ID']);
	if( !empty($goalFirstList) && ($loggedInUserObj->member_type !== 'Admin') ){
		?>
		<h2>Reports</h2>
		<table border="0" width="100%">
			<tr style="background:#eee">
				<td>Goal First Record</td>
				<td>Report Date</td>
				<td>Detail</td>
			</tr>
			<?php
				while($goalFirstRow = mysql_fetch_object($goalFirstList)){
					//$thObj = getTh($goalFirstRow->th_id);
					?>
					<tr>
						<td>Record</td>
						<td><?php echo $goalFirstRow->modification_date;?></td>
						<td>
							<!--<a href="PHPWord_0.6.2_Beta/MyReport/eopReport_O.php?id=<?php echo $goalFirstRow->id;?>" target="_blank" class="showReportLink" id="<?php echo $goalFirstRow->id;?>">Download Report</a>-->
							<a href="PHPWord/MyReport/finalReport.php?id=<?php echo $goalFirstRow->id;?>" target="_blank" class="showReportLink" id="<?php echo $goalFirstRow->id;?>">Download Report</a>
						</td>
					</tr>
					<?php
				}//end while loop
			?>
		</table>
		<div id="reportDetailDiv"></div>
		<?php
	}else{
		echo '<div class="notify notify-red"><span class="symbol icon-error"></span> No Report Data Found!</div>';
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.showReportLink').click(function(){
			//var id = $(this).attr('id');
			//$('#reportDetailDiv').load('files/showreportdetailforthisgoalfirst.php?id='+id);
			//$('#reportDetailDiv').load('PHPW');
		});
	});//end document.ready function
</script>
