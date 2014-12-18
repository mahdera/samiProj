<?php
error_reporting( 0 );
  require_once 'files/user.php';
  require_once 'files/utility.php';

  $email = $_GET['email'];
  $user = null;
  $user = getUserUsingEmailAddress($email);

  if ($user != null){
        $userId = $user->user_id;
        $fullName = $user->first_name." ".$user->last_name;
        $emailFrom = "samsonaklilu@gmail.com";
        $subject = "Your System User Id";
        $emailMessage = "
        <html>
        <head>
                <title>Existing User Id Request for <strong>$fullName</strong></title>
        </head>
        <body>
        <p>
                Dear User:<br/><br/>Per your request, your User-Id is : <strong>$userId</strong>
                <br/><br/>Thank You!<br/><br/>
                <span style='font-style:italic;font-size:x-small;'>This message is auto-generated - Please do not reply to this email.</span>
        </p>
        </body>
        </html>";
        sendEmail($email, $subject, $emailMessage, $emailFrom);
        echo 'An email containing your User Id has been sent to ', $email, '.';
    }else{
        echo $email, ' was not found in our records.';
    }
 ?>
