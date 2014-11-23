<?php
	$currentUserId = $_POST['currentUserId'];
	$newUserId = mysql_real_escape_string($_POST['newUserId']);
	$password = $_POST['password'];

	require_once 'user.php';
	//first check if there is a user with the given userId and current Password combination
	$isThereAcct = isThereAUserWithUserIdAndPassword($currentUserId, $password);
	if($isThereAcct){
		//update the current password with the new password for this user-id
		changeUserUserIdForThisUser($currentUserId, $newUserId, $password);
		echo "User-Id changed successfully!";
	}else{
		echo "There is no user account with the given user-id and password combination. Please try again!";
	}
?>
