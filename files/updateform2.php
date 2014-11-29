<?php
	session_start();
	$id = $_POST['id'];
	@$q21Value = mysql_real_escape_string($_POST['q21Value']);
	@$q22Value = mysql_real_escape_string($_POST['q22Value']);
	@$q23Value = mysql_real_escape_string($_POST['q23Value']);
	require_once 'form2.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		updateForm2($id, $q21Value, $q22Value, $q23Value, "", $_SESSION['LOGGED_USER_ID']);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		updateForm2($id, $q21Value, $q22Value, $q23Value, "", $userObj->id);
	}
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form2 Updated Successfully!</div>
