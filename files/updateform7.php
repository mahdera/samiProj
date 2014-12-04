<?php
	session_start();
	$id = $_POST['id'];
	$q71Value = addslashes($_POST['q71Value']);
	require_once 'form7.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		updateForm7($id, $q71Value, $_SESSION['LOGGED_USER_ID']);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			updateForm7($id, $q71Value, $userObj->id);
		}
	}
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form7 Updated Successfully!</div>
