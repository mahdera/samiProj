<?php
  require_once('../user/Utility.php');
  Environment::loadCASMDatabase();

  $email = $_GET['email'];
  $contactInfo = new ContactInfo();
  $contactInfo = ContactInfoQuery::getContactInfoObjectUsingEmail($email);
  $user = null;
  if ($contactInfo != null)
  {
    $contact = $userKey = $contactInfo->getContacts()->getFirst();
    if ($contact != null && $contact->getContactRefTable() === 'user')
    {
      $user = UserQuery::create()->findPk($contact->getContactRefKey());
    }
  }
	if($user != null){
  	$fullName = $contactInfo->getFullname();
		$userId = $user->getUserId();
		$emailFrom = Utility::SENDER_EMAIL_ADDRESS;
		$subject = "Your CASM NextGen User Id";
		$emailMessage = "
		<html>
		<head>
			<title>CASM - Existing User Request for <strong>$fullName</strong></title>
		</head>
		<body>
		<p>
			Dear CASM NextGen User:<br/><br/>Per your request, your User-Id is : <strong>$userId</strong>
			<br/><br/>Thank You!<br/><br/>
			<span style='font-style:italic;font-size:x-small;'>This message is auto-generated from CASM NextGen - Please do not reply to this email.</span>
		</p>
		</body>
		</html>";
		Utility::sendEmail($email, $subject, $emailMessage, $emailFrom);
    echo 'An email containing your User Id has been sent to ', $email, '.';
	}else{
    echo $email, ' was not found in our records.';
  }
 ?>
