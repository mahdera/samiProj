<?php
	require_once('../files/user.php');

	$userIdEmail = $_GET['userIdEmail'];
	$userObject = UserDefQuery::getUserUsingUserId($userIdEmail);
	$userKey =  ContactInfoDef::getUserKeyUsingEmail($userIdEmail);
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