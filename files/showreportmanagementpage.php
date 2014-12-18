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

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	$goalFirstList = null;

	if($userObj->user_level == '02'){
		$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
		$goalFirstList = getAllGoalFirstsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			$goalFirstList = getAllGoalFirstsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
		}
	}

	//$goalFirstList = getAllGoalFirstsModifiedBy($_SESSION['LOGGED_USER_ID']);
	$loggedInUserObj = getUserUsingTheUserId($_SESSION['LOGGED_USER_ID']);
	if( !empty($goalFirstList) && ($loggedInUserObj->member_type !== 'Admin') ){
		?>
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
							<a href="#.php" class="showReportLink" id="<?php echo $goalFirstRow->id;?>">Show Report</a>
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
			var id = $(this).attr('id');
			$('#reportDetailDiv').load('files/showreportdetailforthisgoalfirst.php?id='+id);
		});
	});//end document.ready function
</script>
