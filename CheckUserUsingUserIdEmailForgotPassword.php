<?php
    require_once('files/user.php');
    require_once 'files/utility.php';
    //am sure the user entered the email address
    $userIdEmail = $_GET['userIdEmail'];	
    //check if the user exists by the given email address and if so send email
    $userCount = doesThisUserAccountExistUsingEmail($userIdEmail);
    if($userCount){
        //update password with random values and send it to the user
        $randomValue = rand(10,100);
        //update the password for this user using email address and send
        updateUserPasswordUsingEmail($userIdEmail, $randomValue);
        //now send the email to the user...
        $from = "mahderalem@gmail.com";
        $headers = "From: $from\r\n";            
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";
        $to = $userIdEmail;
        $subject = "Your new password";
        $message = "A new password has been generated and your old password has been updated. You will need to reset this password to something you can easily remember. Your new/temporary password is : $randomValue";
        sendEmail($to, $subject, $message, $from);
        echo 'An email containing your Password has been sent to ', $userIdEmail, '.';
    }else{
        echo $userIdEmail, ' was not found in our records.';
    }	
?>