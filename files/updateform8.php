<?php
	session_start();
	$id = $_POST['id'];
	$q81Value = addslashes($_POST['q81Value']);
	require_once 'form8.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		updateForm8($id, $q81Value, $_SESSION['LOGGED_USER_ID']);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(isset($userObj)){
			updateForm8($id, $q81Value, $userObj->id);
		}
	}
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form8 Updated Successfully!</div>
