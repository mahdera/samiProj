<?php
  session_start();  
  require_once('../model/Security.php');
  require_once('../model/SecurityAccess.php');
  
  

  try
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    $reason = '';
    $success = Security::authenticateUser($username, $password, &$user, &$reason);
    if ($success)
    {
      //check if security question need answers
      if ($user->countSecurityResponses() < 1)
      {
        header('Location: ../administration/AccountCompletionForm.php');
        exit;
      }
      else
      {
        // Otherwise, we continue to our destination
        Security::continueToDestination();
      }
    } // end successful login section
    else
    {
      // check for failed login reason
      if ($reason === 'status')
      {
        $status = $user->getUserStatus();
        // if locked out, let the user know and long it will be.
        if ($status === AccountStatusTypeQuery::getKey('Locked Out'))
        {
          $diff = Security::lockoutTime($user);
          $timeLeft = ceil(15 - $diff);
          if ($timeLeft > 15)
          {
            $timeLeft = 0;
          }
          $_SESSION['messageToUser'] = ($timeLeft > 0) ? "Your account has been locked due to 3 failed login attempts. Try again after <strong>" . $timeLeft . "</strong> minutes" : "Your account has now been unlocked. Please try again.";
        }
        else
        {
          // only thing left should be 'Suspended' and 'Closed'
          $amContactInfo = ContactInfoQuery::getUserContactInfoUsingUserKey($user->getUserAmKey());
          $_SESSION['messageToUser'] = "Your account is <strong>" . AccountStatusTypeQuery::getValue($user->getUserStatus()) . "</strong>. Please contact your account manager. Use the following information :<br/>" .
                  "<div style='text-align:left'>Account Manager: " . $amContactInfo->getFullname() . "<br/>" .
                  "Email: " . $amContactInfo->getContactEmail() . "<br/>" .
                  "Phone Number: " . $amContactInfo->getContactPhone() . "</div>";
        }
      }
      else
      {
        // only other reason is invalid login
        $_SESSION['messageToUser'] = "Invalid User Id or Password.";
      }
      header("Location: ../login/LoginForm.php");
      exit;
    } // end failed login section
  }
  catch (Exception $e)
  {
    error_log('ValidateUser.php Exception: ' . $e->getTraceAsString());
    $_SESSION['messageToUser'] = "There is problem validating your account.  If this continues, please contact your the help desk. <a src='mailto:PSToolsHelp@publicsafetytools.info'>PSToolsHelp@publicsafetytools.info</a>";
  }

?>
