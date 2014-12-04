<?php
	session_start();
	$id = $_POST['id'];
	$q101Value = addslashes($_POST['q101Value']);
	require_once 'form10.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		updateForm10($id, $q101Value, $_SESSION['LOGGED_USER_ID']);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(isset($userObj)){
			updateForm10($id, $q101Value, $userObj->id);
		}
	}
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form10 Updated Successfully!</div>
