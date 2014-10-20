<?php
	session_start();
	require_once 'utility.php';
	require_once 'user.php';
	$userObj = getUser($_SESSION['LOGGED_USER_ID']);
	$ctr = $_POST['ctr'];
    $selectedEmailAddress = "";
    for($i=1; $i <= $ctr; $i++){
        $checkBoxName = "thCheckBox" . $i;
        //now get the value...
        $selectedEmailAddress .= $_POST["$checkBoxName"] . ",";
    }//end for loop  
    $to = $selectedEmailAddress;
    $subject = "Sharing My Calendar";
    $message = $_POST['message'];
    $from = $userObj->email;
    sendEmail($to, $subject, $message, $from);
?>
<div class="notify notify-green">
	<span class="symbol icon-tick"></span>
	 	Your Calendar/Event has been shared successfully!
</div>