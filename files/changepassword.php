<?php
	$userId = $_POST['userId'];
	$currentPassword = $_POST['currentPassword'];
	$newPassword = mysql_real_escape_string($_POST['newPassword']);

	require_once 'user.php';
	//first check if there is a user with the given userId and current Password combination
	$isThereAcct = isThereAUserWithUserIdAndPassword($userId, $currentPassword);
	if($isThereAcct){
		//update the current password with the new password for this user-id
		changeUserPasswordForThisUser($userId, $currentPassword, $newPassword);
		echo "Password changed successfully!";
	}else{
		echo "There is no user account with the given user-id and password combination. Please try again!";
	}
?>
