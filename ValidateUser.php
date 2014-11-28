<?php
  //error_reporting( 0 );
  session_start();
  //get the userid and password from the login box...
  $userId = $_POST['username'];
  $password = $_POST['password'];
  //now check on the database if there exists a user with the given userid and password.
  require_once 'files/user.php';
  $success = isThereAUserWithUserIdAndPasswordWithStatus($userId,$password, 'Active');

  if($success){
      //get the userId so that it can be stored in a session and saved in record manipulation
      $loggedInUserObj = getUserUsingUserId($userId);
      if($loggedInUserObj->user_status != 'Blocked'){
        $_SESSION['LOGGED_USER_ID'] = $loggedInUserObj->id;
        $_SESSION['INDIVIDUAL_INT_USER_ID'] = $loggedInUserObj->id;
        //this will have to be replaced with branch id now...or zone id


        $_SESSION['USER_ID'] = $userId;
        $_SESSION['SELECTED_THS'] = NULL;
        $_SESSION['GOAL_FIRST_STATUS'] = 'exsisting';
        $_SESSION['GOAL_SECOND_STATUS'] = 'exsisting';

        if($loggedInUserObj->member_type === 'Admin'){
          header('Location: adminhome.php');
        }else{
          header('Location: intro1.php');
        }
      }else{
        $_SESSION['messageToUser'] = "Your account is Blocked. Please contact your account administrator!";
        header('Location: login.php');
      }
  }else{
      $_SESSION['messageToUser'] = "Invalid User Id or Password.";
      header('Location: login.php');
  }
?>
