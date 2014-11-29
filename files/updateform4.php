<?php
	session_start();
	$id = $_POST['id'];
	@$q41Value = mysql_real_escape_string($_POST['q41Value']);
	require_once 'form4.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		updateForm4($id, $q41Value, $_SESSION['LOGGED_USER_ID']);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		updateForm4($id, $q41Value, $userObj->id);
	}	
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form4 Updated Successfully!</div>
