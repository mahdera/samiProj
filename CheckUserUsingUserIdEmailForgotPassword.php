<?php
	require_once('../files/user.php');
        //am sure the user entered the email address
	$userIdEmail = $_GET['userIdEmail'];	
	//check if the user exists by the given email address and if so send email
        $userCount = doesThisUserAccountExistUsingEmail($userIdEmail);
	$theUserKey = null;

	if(isset($userObject)){
		$theUserKey = $userObject->getUserKey();
		require('ShowUserSecretQuestionAnswerEntryForm.php');
	}else if($userKey != null){
		$theUserKey = $userKey;
		require_once('ShowUserSecretQuestionAnswerEntryForm.php');
	}else{
    echo $userIdEmail, ' was not found in our records.';
  }
?>