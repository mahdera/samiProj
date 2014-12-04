<?php
	session_start();
	$id = $_POST['id'];
	$q61Value = addslashes($_POST['q61Value']);
	require_once 'form6.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		updateForm6($id, $q61Value, $_SESSION['LOGGED_USER_ID']);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(isset($userObj)){
			updateForm6($id, $q61Value, $userObj->id);
		}
	}
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form6 Updated Successfully!</div>
